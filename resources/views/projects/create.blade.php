@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.errors')
        @include('messages.flash')

        {!! Form::open(array('action' => 'ProjectController@store')) !!}

        <div class="form-group">
            {!! Form::label('name', 'Project Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('description', 'Project description', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

        {{ Form::submit('Save Project', ['class' => 'btn btn-primary pull-right']) }}

        {!! Form::close() !!}


    </div>

@endsection
