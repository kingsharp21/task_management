<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Get all task route
Route::get('/get_all_task', [TaskController::class, 'index']);
// edit individual task route 
Route::patch('/edit_task', [TaskController::class, 'update']);
// add a task route 
Route::post('/save_task', [TaskController::class, 'store']);
 // delect a task route 
Route::delete('/delete_task', [TaskController::class, 'destroy']);
