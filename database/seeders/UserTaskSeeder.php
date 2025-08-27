<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;

class UserTaskSeeder extends Seeder
{
    public function run()
    {
        // Creamos 3 usuarios de ejemplo
        $user1 = User::factory()->create(['name' => 'Ana Torres', 'email' => 'ana.torres@example.com']);
        $user2 = User::factory()->create(['name' => 'Carlos Rojas', 'email' => 'carlos.rojas@example.com']);
        $user3 = User::factory()->create(['name' => 'Sofía Luna', 'email' => 'sofia.luna@example.com']);

        // Lista de tareas con sentido
        $tasks = [
            // Tareas para Ana (user_id = 1)
            ['title' => 'Preparar presentación para cliente', 'description' => 'Reunir datos de rendimiento y crear diapositivas para la reunión del lunes.', 'status' => 'in_progress', 'user_id' => $user1->id],
            ['title' => 'Revisar contrato de proveedor', 'description' => 'Leer el nuevo contrato de logística y señalar cláusulas importantes.', 'status' => 'pending', 'user_id' => $user1->id],
            ['title' => 'Pagar facturas de servicios', 'description' => 'Realizar el pago de la luz, agua e internet antes de la fecha de vencimiento.', 'status' => 'completed', 'user_id' => $user1->id],

            // Tareas para Carlos (user_id = 2)
            ['title' => 'Actualizar el software del servidor', 'description' => 'Instalar los últimos parches de seguridad en el servidor principal.', 'status' => 'pending', 'user_id' => $user2->id],
            ['title' => 'Hacer copia de seguridad de la base de datos', 'description' => 'Ejecutar el script de backup y verificar la integridad de los datos.', 'status' => 'completed', 'user_id' => $user2->id],

            // Tareas para Sofía (user_id = 3)
            ['title' => 'Diseñar el nuevo logo de la campaña', 'description' => 'Crear tres propuestas de logo basadas en el brief del equipo de marketing.', 'status' => 'in_progress', 'user_id' => $user3->id],
            ['title' => 'Llamar al cliente para feedback', 'description' => 'Contactar al cliente para obtener su opinión sobre el prototipo enviado.', 'status' => 'completed', 'user_id' => $user3->id],
            ['title' => 'Organizar la reunión de equipo semanal', 'description' => 'Agendar la llamada y enviar la invitación a todos los miembros.', 'status' => 'pending', 'user_id' => $user3->id],
        ];

        // Crear las tareas en la base de datos
        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}