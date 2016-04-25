@extends('layouts.app')

@section('content')

    <div class="panel-body">

        <h1>{{ $task->name }}</h1>

        {{$task->status->name}}
        {{$task->priority->name}}
        {{$task->user->name}}

            <p>
                <a href="{{ route('projects.show', $task->project->id) }}">
                    {{$task->project->name}}
                </a>
            </p>

    </div>
