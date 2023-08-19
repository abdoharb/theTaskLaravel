@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if(session('success'))
                            <span class="alert alert-success row">{{session('success')}}</span>
                        @endif

                        @if(session('error'))
                            <span class="alert alert-danger row">{{session('error')}}</span>
                        @endif

                        <p>Edit the task</p>

                        <form method="post" action="{{route('tasks.update', $task->id)}}" class="form border border-1">
                            @csrf
                            <div class="p-4">
                                <div class="input-group">
                                    <label for="title" class="col-md-3 col-form-label">Task Title*</label>
                                    <input type="text" name="title" value="{{$task->title ?? old('title')}}" class="form-control col-md-9  @error('title') is-invalid @enderror">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input-group mt-3">
                                    <label for="description" class="col-md-3 col-form-label">Task Description*</label>
                                    <textarea type="text" name="description" class="form-control col-md-9 @error('description') is-invalid @enderror">{{$task->description ?? old('description')}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input-group mt-3">
                                    <label for="taskTime" class="col-md-3 col-form-label">Task Time*</label>
                                    <input type="datetime-local" name="taskTime" class="form-control col-md-9 @error('taskTime') is-invalid @enderror" value="{{$task->taskTime ?? old('taskTime')}}">
                                    @error('taskTime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input-group mt-5">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
