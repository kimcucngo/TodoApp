<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Route::apiResource('/tasks',TaskController::class);
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::patch('/task/{id}', [TaskController::class, 'update']);
Route::delete('/task/{id}', [TaskController::class, 'destroy']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});