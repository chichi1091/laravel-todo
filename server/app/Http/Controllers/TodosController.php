<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class TodosController extends BaseController
{
    public function getTodos(Request $request): JsonResponse
    {
        $todos = Todos::all();
        return response()->json($todos, 200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    public function getTodo(Request $request, int $id): JsonResponse
    {
        $todo = Todos::find($id);
        return response()->json($todo, 200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    public function createTodo(Request $request): JsonResponse
    {
        $task = $request->input('task');

        DB::beginTransaction();
        try {
            $new = Todos::create([
                'task' => $task,
            ]);
            DB::commit();
        } finally {
            DB::rollBack();
        }

        return response()->json($new, 201,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    public function updateTodo(Request $request, int $id): JsonResponse
    {
        $task = $request->input('task');

        DB::beginTransaction();
        try {
            $todo = Todos::find($id);
            $todo->update(['task' => $task]);
            DB::commit();
        } finally {
            DB::rollBack();
        }

        return response()->json($todo, 201,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    public function deleteTodo(Request $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $todo = Todos::find($id);
            $todo->delete();
            DB::commit();
        } finally {
            DB::rollBack();
        }

        return response()->json(null, 200);
    }
}
