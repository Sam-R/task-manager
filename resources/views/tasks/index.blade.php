@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.errors')
        @include('messages.flash')

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
            <!-- Show only the parent tasks -->
            @if($task->task_id === null)
                <tr>
                    <td>
                        {{ $task->id }}
                    </td>
                    <td>
                        <a href="{{ route('tasks.show', $task->id) }}">
                            {{ $task->name }}
                        </a>

                        <!-- Show child tasks, if any -->
                        <ul>
                        @foreach($task->children as $child)
                        <li>
                            <a href="{{ route('tasks.show', $child->id) }}">
                                {{ $child->name }}
                            </a>
                        </li>
                        @endforeach
                        </ul>

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
            @endif
        @endforeach
    </div>
