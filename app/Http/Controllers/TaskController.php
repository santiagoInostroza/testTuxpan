<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskUpdateRequest;

class TaskController extends Controller
{
    // crear para api
    // index(): Muestra una lista de tareas.
    public function index(){
        $tasks = Task::paginate(10);
        return TaskResource::collection($tasks);
       // return response()->json($tasks, 200);
    }
    // store(Request $request): Crea una nueva tarea.
    public function store(TaskCreateRequest $request){

        $data = $request->validated();
        $task = Task::create($data);
        return new TaskResource($task);
    }
    
    // show(Task $task): Muestra una tarea específica.
    public function show(Task $task){
        return new TaskResource($task);
       // return response()->json($task, 200);
    }
    // update(Request $request, Task $task): Actualiza una tarea.
    public function update(TaskUpdateRequest $request, Task $task){
        $data = $request->validated();
        $task->update($data);
        return response()->json(['message' => 'Task updated'], 200);

        //$task->update($request->all());
        //return response()->json($task, 200);
    }
    // destroy(Task $task): Elimina una tarea.
    public function destroy(Task $task){
        $task->delete();
        return response()->json(['message' => 'Task deleted'], 200);
    }
}
