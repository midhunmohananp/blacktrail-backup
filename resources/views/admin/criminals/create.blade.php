@extends('layouts.master')
@section('title', 'Add New Criminals Form')			
@section('styles')

@trixassets

@endsection

@section('content')
{{-- <register-criminal inline-template> --}}
	<div class="ml-4 mt-4 p-4 w-1/2 bg-white">
		<form action="{{ route('admin.criminals.store') }}" method="POST" @submit.prevent="register_criminal" class="font-basic pt-4 py-4 ml-3 w-full">
			<h3>Register Criminal</h3>
			@include("admin.criminals._form")
			{{-- <v-dialog/> --}}
		</form>
	</div>	
{{-- </register-criminal> --}}
@endsection



