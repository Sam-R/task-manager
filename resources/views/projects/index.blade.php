@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('errors.errors')
        @include('messages.flash')

        <a href="{{ route('projects.create') }}" class="pull-right btn btn-primary">New Project</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>
                    {{ $project->id }}
                </td>
                <td>
                    <a href="{{ route('projects.show', $project->id)}}">
                        {{ $project->name }}
                    </a>
                </td>
                <td>
                    {{ Form::open([
                        'route' => ['projects.destroy', $project->id],
                        'method' => 'DELETE'
                    ]) }}
                    {{ Form::submit('delete', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                </td>
                <td>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Edit Project</a>
                </td>
            </tr>
        @endforeach
    </div>
