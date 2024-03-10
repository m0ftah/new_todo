<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\task as ModelsTask;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request){
        return new TaskCollection(ModelsTask::all());
    }
    public function show(Request $request , ModelsTask $task){
        return new TaskResource($task);

    }

    public function store(StoreTaskRequest $request){
       $validated = $request->validated();
       $task = ModelsTask::create($validated);
        return new TaskResource($task);
    }
    public function update(UpdateTaskRequest $request, ModelsTask $task){
        $validated = $request->validated();
        $task-> update($validated); 
        return new TaskResource($task);
    }

    public function destroy(ModelsTask $task){ 
        $task->delete();
        return response()->noContent();
    }
     
}
