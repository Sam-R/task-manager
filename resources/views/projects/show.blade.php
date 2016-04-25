@extends('layouts.app')

@section('content')

    <div class="panel-body">

        <h1>{{ $project->name }}</h1>

        @foreach($project->tasks as $task)
            <p>
                <a href="{{ route('tasks.show', $task->id) }}">
                    {{$task->name}}
                </a>
                ({{$task->status->name}})
            </p>
        @endforeach

    </div>
