@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <table class="table table-bordered mt-2">

                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <td>{{$task->id}}</td>
                                </tr>
                                <tr>
                                    <th>Task Title</th>
                                    <td>{{$task->title}}</td>
                                </tr>
                                <tr>
                                    <th>Task Time</th>
                                    <td>{{$task->taskTime}}</td>
                                </tr>
                                <tr>
                                    <th>Created at</th>
                                    <td>{{$task->created_at}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
