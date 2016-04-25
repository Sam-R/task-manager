@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            @foreach ($flash_message->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('flash_message'))
    <!-- Form Error List -->
    <div class="alert alert-info">
        {{ Session::get('flash_message') }}
    </div>
@endif
