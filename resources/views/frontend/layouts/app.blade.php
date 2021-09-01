<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>

        @include('frontend.layouts.sidebar')
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>