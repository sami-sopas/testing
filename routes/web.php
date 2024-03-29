<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProjectTasksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/projects',[ProjectsController::class, 'index'])->name('projects.index');
    Route::get('/projects/create',[ProjectsController::class, 'create'])->name('projects.create');
    Route::get('/projects/{project}',[ProjectsController::class, 'show'])->name('projects.show');
    Route::get('/projects/{project}/edit',[ProjectsController::class, 'edit'])->name('projects.edit');
    Route::patch('/projects/{project}',[ProjectsController::class, 'update'])->name('projects.update');
    Route::post('/projects',[ProjectsController::class, 'store'])->name('projects.store');

    Route::post('/projects/{project}/tasks',[ProjectTasksController::class, 'store'])->name('projects.tasks.store');
    Route::patch('/projects/{project}/tasks/{task}',[ProjectTasksController::class, 'update'])->name('projects.tasks.update');
});



// Route::get('/projects', function () {
//     $projects = App\Models\Project::all();
//     return view('projects.index', compact('projects'));
// });

// Route::post('/projects', function () {
//     App\Models\Project::create(request(['title', 'description']));
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
