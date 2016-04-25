<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Task Manager</title>

        <!-- CSS And JavaScript -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- JQuery -->
        <script src="http://code.jquery.com/jquery-2.2.3.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <style>
        body { padding-top: 70px; }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <a href="/" class="navbar-brand">
                Task Manager
            </a>
            <ul class="nav navbar-nav">
                <li><a href="{{ route('projects.index') }}">Projects</a></li>
                <li><a href="{{ route('tasks.index')  }}">Tasks</a></li>
            </ul>
        </nav>
        <div class="container">
            @yield('content')
        </div>

    </body>
</html>
