<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(CreateTaskRequest $req) {
        $createdTask = Task::create($req->validated());
        
        return response()->json($createdTask, 201);
    }

    public function index() {
        return TaskResource::collection(Task::all());
    }
}
