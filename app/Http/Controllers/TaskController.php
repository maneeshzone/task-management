<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('tasks.index', [ 
            'tasks' => Task::filter(request(['project']))->get()->sortBy('priority'), 
            'projects' => Project::all(),
            'project' => request('project')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create', ['projects' => Project::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();

        $task = new Task;
 
        $task->name = $validated['name'];

        $task->project_id = $validated['project_id'];

        $task->priority = $validated['priority'];
 
        $task->save();

        return redirect()->route('tasks.index')->with('status', 'Task created!');        
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task, 'projects' => Project::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $validated = $request->validated();

        $task->name = $validated['name'];

        $task->project_id = $validated['project_id'];

        $task->priority = $validated['priority'];
 
        $task->save();

        return redirect()->route('tasks.index')->with('status', 'Task updated!');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('status', 'Task deleted!');
    }
}
