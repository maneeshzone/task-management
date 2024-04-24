<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TasksPriorityUpdateRequest;

class TasksPriorityUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(TasksPriorityUpdateRequest $request)
    {
        $validated = $request->validated();

        foreach($validated['priority'] AS $priority => $taskId){
            $task = Task::findOrFail($taskId);
            $task->priority = $priority + 1;
            $task->save();
        }

        return response()->json(['success' => true]);        
    }
}
