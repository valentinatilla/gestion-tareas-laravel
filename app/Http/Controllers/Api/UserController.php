<?php
// app/Http/Controllers/Api/UserController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    // Lista todos los usuarios
    public function index()
    {
        return User::all();
    }

    // Lista las tareas de un usuario específico
    public function userTasks(User $user)
    {
        return $user->tasks;
    }
}