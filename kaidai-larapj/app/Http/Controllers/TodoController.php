<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class TodoController extends Controller
{
    public function index()
    {;
        $todos = Todo::all();
        $form = Todo::find(11);
        return view('index',['todos' => $todos,'form' => $form]);
    }


    public function create(ClientRequest $request)
    {
        $form = $request -> all();
        Todo::create($form);
        return redirect('/');
    }

    public function update(ClientRequest $request)
    {
        $form = $request->all();   
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(ClientRequest $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }
}
