@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.errors')


        {!! Form::open(array('action' => 'TaskController@store')) !!}

        {!! Form::label('name', 'Task Name') !!}
        {!! Form::text('name') !!}

        {!! Form::label('description', 'Task description') !!}
        {!! Form::textarea('description') !!}

        {!! Form::label('status', 'Task Status') !!}
        {{ Form::select('status', $statuses) }}

        {!! Form::label('priority', 'Task Priority') !!}
        {{ Form::select('priority', $priorities) }}

        {!! Form::label('category', 'Task Category') !!}
        {{ Form::select('category', $categories) }}

        {!! Form::label('project', 'Task Project') !!}
        {{ Form::select('project', $projects) }}

        {!! Form::label('task', 'Parent Task') !!}
        {{ Form::select('task', $tasks) }}

        {!! Form::label('user', 'Owner Task') !!}
        {{ Form::select('user', $users) }}

        {{ Form::submit('Save Task') }}

        {!! Form::close() !!}


    </div>

    <!-- TODO: Current Tasks -->
@endsection
