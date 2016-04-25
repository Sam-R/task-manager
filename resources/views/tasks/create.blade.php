@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.errors')


        {!! Form::open(array('action' => 'TaskController@store')) !!}

        {!! Form::label('name', 'Task Name', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}

        {!! Form::label('description', 'Task description', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

        {!! Form::label('status', 'Task Status', ['class' => 'control-label']) !!}
        {{ Form::select('status', $statuses), null, ['class' => 'form-control'] }}

        {!! Form::label('priority', 'Task Priority', ['class' => 'control-label']) !!}
        {{ Form::select('priority', $priorities), null, ['class' => 'form-control'] }}

        {!! Form::label('category', 'Task Category', ['class' => 'control-label']) !!}
        {{ Form::select('category', $categories), null, ['class' => 'form-control'] }}

        {!! Form::label('project', 'Task Project', ['class' => 'control-label']) !!}
        {{ Form::select('project', $projects), null, ['class' => 'form-control'] }}

        {!! Form::label('task', 'Parent Task', ['class' => 'control-label']) !!}
        {{ Form::select('task', ['' => 'None'] +  $tasks), null, ['class' => 'form-control'] }}

        {!! Form::label('user', 'Owner Task', ['class' => 'control-label']) !!}
        {{ Form::select('user', $users), null, ['class' => 'form-control'] }}

        {{ Form::submit('Save Task', ['class' => 'btn btn-primary']) }}

        {!! Form::close() !!}


    </div>

    <!-- TODO: Current Tasks -->
@endsection
