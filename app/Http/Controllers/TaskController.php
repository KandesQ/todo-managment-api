<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(CreateTaskRequest $req) {
        $createdTask = Task::create($req->validated());
        
        # TODO: change to TaskResource
        return response()->json($createdTask, 201);
    }

    public function index() {
        return TaskResource::collection(Task::all());
    }

    public function show($id) {
        return new TaskResource(Task::findOrFail($id));
    }

    public function update(UpdateTaskRequest $updateReq, $id) {
        $validUpdateReq = $updateReq->validated();
    
        $taskToUpdate = Task::findOrFail($id);
        $taskToUpdate->update($validUpdateReq);

        return new TaskResource($taskToUpdate->refresh());
    }
}
