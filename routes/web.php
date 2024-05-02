<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\TodoTaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [TodoTaskController::class, 'index']);

Route::post('/tambahTask', [TodoTaskController::class, 'addTask']);

Route::get('/edit/{id}', [TodoTaskController::class, 'editTask']);
Route::put('/updateTask', [TodoTaskController::class, 'updateTask']);

Route::delete('/deleteTask/{id}', [TodoTaskController::class, 'deleteTask']);

Route::get('/{id}', [TodoTaskController::class, 'showTask']);

Route::post('/addComment', [CommentController::class, 'addComment']);

Route::delete('/deleteComment/{id}', [CommentController::class, 'deleteComment']);