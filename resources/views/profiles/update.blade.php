@extends('layouts.master')

@section('title', 'Welcome to your Profile')

@section('content')
<section class="w-1/2 mt-8 m-auto h-full">
	<h3 class="p-4">Setup your account profile:</h3>
	<div class="bg-white m-auto h-full p-4">
		@php
		use \App\Country ; 
		$countries = Country::select('id','name')->get();
		@endphp

		<update-profile :country="{{  $countries }}":user="{{  auth()->user() }}"></update-profile>
		{{-- <form action="{{ route('profiles') }}" class=""> --}}
			{{-- <setu/p-billing></setup-billing> --}}
			{{-- @include('partials.forms._billing-form') --}}
		{{-- </form> --}}
	</section>

	@endsection