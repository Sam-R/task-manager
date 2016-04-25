@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="container">
        <!-- Display Validation Errors -->
        @include('errors.errors')
        @include('messages.flash')

        {!! Form::open(array('action' => 'TaskController@store', 'class' => 'form-horizontal')) !!}

            @include('tasks._fields')

        {{ Form::submit('Save Task', ['class' => 'btn btn-primary pull-right']) }}

        {!! Form::close() !!}


    </div>

@endsection
