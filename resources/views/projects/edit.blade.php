@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.errors')
        @include('messages.flash')

        {!!
            Form::model( $project, [
                'method' => 'PATCH',
                'action' => ['ProjectController@update', $project->id]
            ])
        !!}

            @include('projects._fields')

            {{ Form::submit('Save Project', ['class' => 'btn btn-primary pull-right']) }}

        {!! Form::close() !!}

        {{ Form::open([
            'route' => ['projects.destroy', $project->id],
            'method' => 'DELETE'
        ]) }}
            {{ Form::submit('delete', ['class' => 'btn btn-danger']) }}
        {{ Form::close() }}

    </div>

@endsection
