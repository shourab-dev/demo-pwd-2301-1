@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  

                            <div class="card p-3" >
                                <h3>Add Event</h3>
                                <form action="{{ url('/store') }}" method="POST">
                                    @csrf
                                    <input name="title" type="text" placeholder="Enter your title" class="form-control">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    <input type="date" name="date" placeholder="Enter your date" class=" my-3 form-control">
                                    <button class="btn btn-primary">Submit</button>
                                </form>
                            </div>

                </div>
            </div>


            
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Event</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($events as $event)
                        
                    
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->title }}</td>
                        <td>Show</td>
                    </tr>
                    @endforeach


                </table>
            </div>
        </div>
    </div>
</div>
@endsection
