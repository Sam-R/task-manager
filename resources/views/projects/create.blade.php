@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.errors')
        @include('messages.flash')

        {!! Form::open(array('action' => 'ProjectController@store')) !!}

            @include('projects._fields')

            {{ Form::submit('Save Project', ['class' => 'btn btn-primary pull-right']) }}

        {!! Form::close() !!}

    </div>

@endsection
