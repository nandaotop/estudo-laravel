<?php

namespace App\Http\Controllers;

use App\Models\TodoList;

class TodoListController extends Controller
{
    public function index()
    {
        return TodoList::all();
    }
}
