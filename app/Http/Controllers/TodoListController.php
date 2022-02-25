<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoListController extends Controller
{
    public function index()
    {
        return TodoList::all();
    }

    public function show($id)
    {
        $todo = TodoList::find($id);
        return response($todo);
    }

    public function store(Request $request)
    {
        $todolist = TodoList::created($request->all());
        return response($todolist, Response::HTTP_CREATED);
    }
}
