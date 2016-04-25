@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="container">
        <!-- Display Validation Errors -->
        @include('errors.errors')
        @include('messages.flash')

        {!!
            Form::model( $task, [
                'method' => 'PATCH',
                'action' => ['TaskController@update', $task->id],
                'class' => 'form-horizontal'
            ])
        !!}

        @include('tasks._fields')

        {{ Form::submit('Save Task', ['class' => 'btn btn-primary pull-right']) }}

        {!! Form::close() !!}

        {{ Form::open([
            'route' => ['tasks.destroy', $task->id],
            'method' => 'DELETE'
        ]) }}
            {{ Form::submit('delete', ['class' => 'btn btn-danger']) }}
        {{ Form::close() }}

    </div>

@endsection
