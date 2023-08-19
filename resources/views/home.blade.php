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

                    <p>Welcome back, <b>{{auth()->user()->firstName.' '.auth()->user()->lastName}}</b></p>

                    <a href="{{route('tasks.create')}}" class="btn btn-primary mt-3">Create a new task</a>
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Task Title</th>
                                <th>Task Time</th>
                                <th>show</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->title}}</td>
                                <td>{{$task->taskTime}}</td>
                                <td><a href="{{route('tasks.show', $task->id)}}">show</a> </td>
                                <td><a href="{{route('tasks.edit', $task->id)}}">edit</a> </td>
                                <td>
                                <form action="{{ route('tasks.destroy',$task->id) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-link" onclick="return confirm('Sure Want Delete?')">Delete</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
