<?php

use App\Http\Controllers\API\TasksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('tasks', TasksController::class);
Route::match(['put', 'patch'], '/tasks/{task}/done', [TasksController::class, 'done'])->name('tasks.done');
