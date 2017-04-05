<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/videos.css') }}">

</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('admin.login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('admin.login') }}">Login</a>
                {{--<a href="{{ url('/register') }}">Register</a>--}}
            @endif
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Laravel - <span class="lacc">LACC</span>
        </div>
    </div>

        <script src="{{ asset('js/videos.js') }}"></script>
</div>
</body>
</html>
