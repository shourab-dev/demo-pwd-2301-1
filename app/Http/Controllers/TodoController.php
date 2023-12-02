<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    private  $rules =  [
        'title' => 'required',
        'detail' => 'required|max:250'
    ];


    private $msg = [
        'title.required' => "Please enter your title",
        'detail.required' => "Please enter your detail",
        'detail.max' => "You can not enter more than 250",
    ];




    public function index()
    {
        return view('homepage');
    }



    function allTodo()
    {
        return view('todo.allTodo');
    }

    function completeTodo()
    {
        return view('completeTodo');
    }


    function storeTodo(Request $request)
    {
        $request->validate($this->rules, $this->msg);
        //* data base store
        $todo = new Todo();
        $this->todoStoreAndUpdate($todo, $request);
        return back();
    }


    function allTodos()
    {

        $todos = Todo::where('status', 0)->latest()->paginate(8);

        return view('all', compact('todos'));
    }

    function editTodo($id)
    {
        $editedTodo = Todo::findOrFail($id);
        return view('edit', compact('editedTodo'));
    }



    function updateTodo(Request $request, $id)
    {
        $request->validate($this->rules, $this->msg);

        //* update
        $todo = Todo::find($id);
        $this->todoStoreAndUpdate($todo, $request);
        return back();
    }

    function deleteTodo($id) {
        Todo::find($id)->delete();
        return back();
    }


    private function todoStoreAndUpdate($todo, $request)
    {
        $todo->title = $request->title;
        $todo->detail = $request->detail;
        $todo->author = $request->author;
        $todo->save();
    }
}
