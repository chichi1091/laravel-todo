<?php

use App\Http\Controllers\TodosController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/todos", [TodosController::class, "getTodos"]);
Route::get("/todos/{id}", [TodosController::class, "getTodo"]);
Route::post("/todos", [TodosController::class, "createTodo"]);
Route::put("/todos/{id}", [TodosController::class, "updateTodo"]);
Route::delete("/todos/{id}", [TodosController::class, "deleteTodo"]);
