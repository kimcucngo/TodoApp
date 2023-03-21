<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * Task一覧
     * @return Task[]\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $tasks = Task::orderByDesc('id')->get();
        return $tasks;
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse 
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create ($request->all());
        return $task
        ? response()->json($task,201)
        : response()->json([],500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}