<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">  
    <link href="{{ asset('css/app.css')}}" rel="stylesheet" data-turbolinks-track="true">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">  
    <script>    
        window.App = @include("partials.stubs.global-vars")
    </script>     
</head>
<body class="h-full">
    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="{{ mix('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>