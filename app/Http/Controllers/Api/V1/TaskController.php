<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\V1\TaskResource;

class TaskController extends Controller
{
    public function index(){
        return TaskResource::collection(Task::all());
    }

    public function show(Task $task){
        return new TaskResource($task);
    }

    public function store(StoreTaskRequest $request){
        Task::create($request->validated());
        return response()->json('task Created successfully');

    }

    public function update(StoreTaskRequest $request, Task $task){

        $task->update($request->validated());
        return response()->json('task updated successfully');
    }

    public function destroy(Task $task){

        $task->delete();
        return response()->json('task deleted successfully');
    }
}
