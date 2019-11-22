@extends('layouts.master')
@section('title', 'Add New Criminals Form')			
@section('content')
<register-criminal inline-template>
	<div class="ml-4 mt-4 p-4 w-1/2 bg-white">
		<form @submit.prevent="register_criminal" class="font-basic pt-4 py-4 ml-3 w-full">
			<h3>Register Criminal</h3>
			@include("admin.criminals._form")
		</form>
	</div>
</register-criminal>
@endsection



