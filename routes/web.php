<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('projects', ProjectController::class)->middleware('auth');
Route::get('/projects/editt/{id}', [ProjectController::class, 'editt'])->name('projects.editt');
Route::get('/projects/updatte/{id}', [ProjectController::class, 'updatte'])->name('projects.updatte');

Route::resource('tasks', TaskController::class)->middleware('auth');
Route::get('/tasks/start/{id}', [TaskController::class, 'start'])->name('tasks.start');
Route::get('/tasks/end/{id}', [TaskController::class, 'end'])->name('tasks.end');
Route::get('/tasks/kill/{id}', [TaskController::class, 'kill'])->name('tasks.kill');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::redirect('/', '/dashboard');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
