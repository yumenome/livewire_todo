<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosApiController extends Controller
{
    public function index(){
        return Todo::all();
    }

    public function store(Request $req){
        if(!$req->name){
            return response('name required!', 400);
        }
        $todo = new Todo;
        $todo->name = $req->name;
        $todo->save();

        return $todo;
    }

    public function show(Todo $todo){
        return $todo;
    }

    public function update(Request $req, Todo $todo){
        if(!$req->name){
            return response('name required!', 400);
        }
        $todo->name = $req->name;
        $todo->save();

        return $todo;
    }

    public function destroy(Todo $todo){
        $todo->delete();
        return $todo;
    }
}
