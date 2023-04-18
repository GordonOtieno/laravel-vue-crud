<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return response()->json('Hell from index');
    }

    public function store(StoreTaskRequest $request){
        Task::create($request->validated());
        return response()->json('Skills Created');

    }

    public function update(StoreTaskRequest $request, Task $task){

        $task->update($request->validated());
        return response()->json('task updated');
    }
}
