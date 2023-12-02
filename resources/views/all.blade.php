@extends('layouts.frontendLayout')
@section('frontend')

{{-- {{ dd($todos) }} --}}
<div class="container my-5">
    <div class="card">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Detail</th>
                <th>Author</th>
                <th>Time</th>
                <th>Update</th>
                <th>Action</th>
            </tr>

            @foreach ($todos as $key=>$todo)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $todo->title }}</td>
                <td>{{ str($todo->detail)->length() > 5 ? str($todo->detail)->substr(0, 5) . "..." : $todo->detail}}
                </td>
                <td>{{ $todo->author }}</td>
                <td>
                    {{ Carbon\Carbon::parse($todo->created_at)->diffForHumans() }}
                </td>
                <td>
                    {{ Carbon\Carbon::parse($todo->updated_at)->diffForHumans() }}
                </td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('edit', $todo->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('delete', $todo->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </table>


        {{ $todos->links() }}
    </div>
</div>

@endsection