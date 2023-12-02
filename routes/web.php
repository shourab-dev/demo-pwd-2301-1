<?php

use App\Models\Todo;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

// Route::get('/', Controller);
Route::get('/', [TodoController::class, 'index'])->name('homepage');

Route::get('/todos', [TodoController::class, 'allTodo'])->name('todos');

Route::get('/completed-todos', [TodoController::class, 'completeTodo'])->name('complete');


Route::post('/store-todo', [TodoController::class, 'storeTodo'])->name('store');


Route::get('/todos', [TodoController::class, 'allTodos'])->name('all');

Route::get('/edit-todo/{id}', [TodoController::class, 'editTodo'])->name('edit');


Route::put('/update-todo/{id}', [TodoController::class, 'updateTodo'])->name('update');


Route::delete('/delete-todo/{id}', [TodoController::class, 'deleteTodo'])->name('delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/store', function(Request $req) {
    $req->validate([
        'title' => 'required|min:5|max:10'
    ]);
    //* validate
    $event = new Event();
    $event->title = $req->title;
    $event->date = $req->date;
    $event->save();
    return back();



});