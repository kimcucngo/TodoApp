<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PostTaskRequest;
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
     * @param PostTaskRequest $PostTaskRequest
     * @return \Illuminate\Http\JsonResponse 
     */
    public function store(PostTaskRequest $request)
    {
        $validated = $request->validated();
        $task = Task::create($validated);
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
    public function update(PostTaskRequest $request, $id)
    {
        return Task::find($id)->update([
            'title' => $request->title,
            'is_done' =>  $request->is_done
        ])  
        ? response()->json(Task::find($id)->get())
        : response()->json([],500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
    }
}