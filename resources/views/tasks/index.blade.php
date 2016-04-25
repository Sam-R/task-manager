@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.errors')

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>
                    {{ $task->id }}
                </td>
                <td>
                    {{ $task->name }}
                </td>
                <td>
                    {{ Form::open([
                        'route' => ['tasks.destroy', $task->id],
                        'method' => 'DELETE'
                    ]) }}
                    {{ Form::submit('delete', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit Task</a>
                </td>
            </tr>
        @endforeach
    </div>
