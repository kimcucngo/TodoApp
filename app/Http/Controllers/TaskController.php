<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        $task = Task::create($request->all());
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
     * @return \Illuminate\Http\JsonResponse 
     */
    public function update(Request $request, Task $task)
    {
        $task -> title = $request -> title;

        return $task -> update()
        
        ? response()->json($task)
        : response()->json([],500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        return $task -> delete()
        
        ? response()->json($task)
        : response()->json([],500);
    }
}