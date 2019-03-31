<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('packages/bootstrap-4.2.1-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        @notify_css
        <link href="{{ asset('src/css/main.css') }}" rel="stylesheet">
    </head>

    <body>
        <!-- Header content -->
        @include('partials.header')

        <!-- Main content -->
        <section class="container" >
            @yield('content')
        </section>

        <!-- Footer content -->
        @include('partials.footer')


        <!-- Scripts -->
        <script src="{{ asset('packages/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('packages/popper.min.js') }}"></script>
        <script src="{{ asset('packages/bootstrap-4.2.1-dist/js/bootstrap.min.js') }}"></script>
        @notify_js
        @notify_render
        <script src="{{ asset('src/js/main.js') }}"></script>
    </body>
</html>
