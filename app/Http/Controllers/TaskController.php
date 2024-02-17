<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // crear para api
    // index(): Muestra una lista de tareas.
    public function index(){
        $tasks = Task::all();
        return response()->json($tasks, 200);
    }
    // store(Request $request): Crea una nueva tarea.
    public function store(Request $request){
        $task = Task::create($request->all());
        return response()->json($task, 201);
    }
    
    // show(Task $task): Muestra una tarea específica.
    public function show(Task $task){
        return response()->json($task, 200);
    }
    // update(Request $request, Task $task): Actualiza una tarea.
    public function update(Request $request, Task $task){
        $task->update($request->all());
        return response()->json($task, 200);
    }
    // destroy(Task $task): Elimina una tarea.
    public function destroy(Task $task){
        $task->delete();
        return response()->json(null, 204);
    }
}
