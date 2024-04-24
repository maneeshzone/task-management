<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TasksPriorityUpdateController;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});
Route::resource('tasks', TaskController::class);
Route::patch('/tasks-priority-update', TasksPriorityUpdateController::class)->name('tasks-priority-update');