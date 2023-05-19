<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TaskController::class, 'index']);
Route::get('/create', [TaskController::class, 'create']);
Route::post('/upload', [TaskController::class, 'upload']);
Route::get('/{id}/edit', [TaskController::class, 'edit']);
Route::patch('/update', [TaskController::class, 'update']);
Route::get('/{id}/completed', [TaskController::class, 'completed']);
Route::get('/{id}/delete', [TaskController::class, 'delete']);

Route::get('/{id}/project', [ProjectController::class, 'project']);
Route::post('/createProject', [ProjectController::class, 'createProject']);
Route::any('/addToProject', [ProjectController::class, 'addToProject'])->name('addToProject');
