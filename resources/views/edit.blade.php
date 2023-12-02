@extends('layouts.frontendLayout')

@section('title')
Homepage
@endsection


@section('frontend')

<div class="card col-lg-5 mx-auto mt-5">

    <div class="card-header">Edit Todo</div>
    <div class="card-body">
        <form action="{{  route('update', $editedTodo->id)  }}" method="POST">
            @csrf
            @method('put')
            <input value="{{ $editedTodo->title }}" name="title" type="text" class="form-control my-2"
                placeholder="Todo Title">

            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <textarea name="detail" placeholder="Description" class="form-control my-2">{{ $editedTodo->detail }}</textarea>

            @error('detail')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <input value="{{ $editedTodo->author }}" type="text" name="author" class="form-control my-2" placeholder="Author">
            <button class="btn btn-primary">Update Todo</button>


        </form>
    </div>


</div>


@endsection