@extends('layouts.master')

@section('title', 'Welcome to your Billing Profile')

@section('content')
<section class="w-1/2 mt-8 m-auto h-full">
	<h3 class="p-4">Setup your billing profile:</h3>
	<div class="bg-white m-auto h-full p-4">
		<form action="/billing" class="">
			<setup-billing></setup-billing>
			{{-- @include('partials.forms._billing-form') --}}
		</section>
@endsection

@section('scripts')
{{-- 	<script>
$(function(){
$("form#setup-billing-form").hide();
});
</script> --}}
@endsection