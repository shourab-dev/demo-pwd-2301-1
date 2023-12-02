@extends('layouts.frontendLayout')

@section('title')
    Homepage
@endsection


@section('frontend')

    <div class="card col-lg-5 mx-auto mt-5">

        <div class="card-header">Add Todo</div>
        <div class="card-body">
            <form action="{{  route('store')  }}" method="POST">
                @csrf
                <input value="{{ old('title') }}" name="title" type="text" class="form-control my-2" placeholder="Todo Title">

                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <textarea name="detail" placeholder="Description" class="form-control my-2">{{ old('detail') }}</textarea>

                @error('detail')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <input value="{{ old('author') }}" type="text" name="author" class="form-control my-2" placeholder="Author">
                <button class="btn btn-primary">Submit Todo</button>


            </form>
        </div>

        
    </div>


@endsection