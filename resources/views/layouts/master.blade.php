<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- <meta name="viewport" content="width=SITE_MIN_WIDTH, initial-scale=1, maximum-scale=1"> --}}
  {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
  <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
  <link rel="icon" href="{{  asset('assets/images/group_avatar.jpg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">  
  {{--  <link href="{{ asset('css/styles.css')}}" rel="stylesheet" data-turbolinks-track="true">--}}
  <link href="{{ asset('css/app.css')}}" rel="stylesheet" data-turbolinks-track="true">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">  
  {{-- when using microsoft edge as a developer tools..--}}
  {{-- <script src="http://localhost:8098"></script>
  <script src="http://192.168.22.3:8098"></script> --}}
  <script>    
    window.App = @include("partials.stubs.global-vars")
  </script>     
  @yield('styles')
</head>
<body class="bg-grey-lighter-2 tracking-normal font-basic">
  <div id="app">
    <div class="m-auto">
      @if(session()->has('logoutMessage'))
        <flash-message message="{{ trans('flash.logout_success') }}"></flash-message>
      @endif 

      @if(session()->has('confirmation_success_message'))
        <flash-message message="{{ trans('flash.confirmation_success') }}"></flash-message>
      @endif
      
      @if(session()->has('flash-message'))
      <flash-message message="{{ session('flash-message' ) }}"></flash-message>
      @endif

      <app-header inline-template>
        @include('partials.main-header')
     </app-header>

     <main class="flex m-auto">
      @if (auth()->check())            
      @include('partials.sidebar')
      @endif
      @yield("content")
    </main>
  </div>
</div>
<script data-turbolinks-suppress-warning src="{{ mix('js/app.js') }}"></script>
@yield("scripts")
</body>
</html> 