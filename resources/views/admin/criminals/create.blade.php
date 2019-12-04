@extends('layouts.master')
@section('title', 'Add New Criminals Form')			
@section('styles')
@trixassets
@endsection

@section('content')

<register-criminal inline-template :editor="@trix(\App\CriminalInfo::class, 'complete_description')">
	<div class="ml-4 mt-4 p-4 w-1/2 bg-white">
		<form ref="criminalsInfo" @submit.prevent="register_criminal" method="POST" class="font-basic pt-4 py-4 ml-3 w-full">
			<h3>Register Criminal</h3>
			@include("admin.criminals._form")
		</form>
	</div>  
</register-criminal>

@stop

