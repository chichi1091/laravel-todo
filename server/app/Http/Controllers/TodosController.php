<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class TodosController extends BaseController
{
    public function getTodos(Request $request): JsonResponse
    {
        return response()->json([], 200);
    }

    public function getTodo(Request $request, int $id): JsonResponse
    {
        return response()->json([], 200);
    }

    public function createTodo(Request $request, int $id): JsonResponse
    {
        return response()->json(null, 201);
    }

    public function updateTodo(Request $request, int $id): JsonResponse
    {
        return response()->json(null, 201);
    }

    public function deleteTodo(Request $request, int $id): JsonResponse
    {
        return response()->json(null, 201);
    }
}
