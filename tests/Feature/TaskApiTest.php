<?php
// tests/Feature/TaskApiTest.php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;

class TaskApiTest extends TestCase
{
    use RefreshDatabase; // Esta línea es clave: reinicia la BD para cada prueba.

    protected $user;
    protected $headers;

    // Este método se ejecuta antes de cada prueba
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->headers = ['Authorization' => 'Bearer ' . env('API_TOKEN')];
    }

    public function test_user_can_create_a_task_correctly()
    {
        $taskData = [
            'title' => 'Tarea de prueba desde el test',
            'status' => 'pending',
            'user_id' => $this->user->id,
        ];

        $response = $this->withHeaders($this->headers)->postJson('/api/tasks', $taskData);

        $response->assertStatus(201)
                 ->assertJsonFragment(['title' => 'Tarea de prueba desde el test']);
    }

    public function test_cannot_create_task_with_invalid_data()
    {
        $taskData = ['title' => 'No']; // Título demasiado corto

        $response = $this->withHeaders($this->headers)->postJson('/api/tasks', $taskData);

        $response->assertStatus(422) // Error de validación
                 ->assertJsonValidationErrors(['title', 'status', 'user_id']);
    }

    public function test_a_task_can_be_deleted()
    {
        $task = Task::factory()->create(['user_id' => $this->user->id]);

        $response = $this->withHeaders($this->headers)->deleteJson("/api/tasks/{$task->id}");

        $response->assertStatus(204); // Sin contenido, éxito

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}