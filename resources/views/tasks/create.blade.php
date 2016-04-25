@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.errors')


        {!! Form::open(array('action' => 'TaskController@store', 'class' => 'form-horizontal')) !!}

        <div class="form-group">
            {!! Form::label('name', ' Name', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-10">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-10">
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('parent', 'Parent Task', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-10">
                {{ Form::select('parent', $tasks, null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('user', 'Owner/Assignee', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-10">
                {{ Form::select('user', $users, null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('status', 'Status', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-10">
                {{ Form::select('status', $statuses, null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('priority', 'Priority', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-10">
                {{ Form::select('priority', $priorities, null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('category', 'Category', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-10">
                {{ Form::select('category', $categories, null, ['class' => 'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('project', 'Project', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-10">
                {{ Form::select('project', $projects, null, ['class' => 'form-control']) }}
            </div>
        </div>

        {{ Form::submit('Save Task', ['class' => 'btn btn-primary pull-right']) }}

        {!! Form::close() !!}


    </div>

    <!-- TODO: Current Tasks -->
@endsection
