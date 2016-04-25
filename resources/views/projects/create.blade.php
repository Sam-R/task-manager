@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.errors')


        {!! Form::open(array('action' => 'ProjectController@store')) !!}

        {!! Form::label('name', 'Project Name', ['class' => 'control-label']) !!}
        {!! Form::text('name', null,['class' => 'form-control']) !!}

        {!! Form::label('description', 'Project description', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

        {{ Form::submit('Save Project', ['class' => 'btn btn-primary pull-right']) }}

        {!! Form::close() !!}


    </div>

@endsection
