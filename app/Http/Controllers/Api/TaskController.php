<?php
// app/Http/Controllers/Api/TaskController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    // Crear una nueva tarea
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|min:5',
            'description' => 'nullable|string|max:500',
            'status' => ['required', Rule::in(['pending', 'in_progress', 'completed'])],
            'user_id' => 'required|exists:users,id',
        ]);

        $task = Task::create($validatedData);

        return response()->json($task, 201);
    }

    // Actualizar una tarea existente
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|min:5',
            'description' => 'nullable|string|max:500',
            'status' => ['sometimes', 'required', Rule::in(['pending', 'in_progress', 'completed'])],
        ]);

        $task->update($validatedData);

        return response()->json($task);
    }

    // Eliminar una tarea
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }
}