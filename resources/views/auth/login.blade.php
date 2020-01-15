@extends('layouts.master')	

@section('title', 'Login')	

@section('content')

<section class="w-1/2 mt-8 m-auto h-full">
	<form action="{{ route('postLogin') }}" method="POST" class="bg-white p-10 ml-4 mt-4 font-basic font-normal w-4/5">
		<h3 class="mb-4">Login to your Account</h3>
		<div class="mb-6">

			<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Pin</label>

			{{  csrf_field() }}		

			<input type="text" class="bg-white w-full border-grey-darken-2 border-2  mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Username / Email" value="{{ old('pin') }}" required>

			@if ($errors->has('pin'))
			<span class="help-block text-red ">
				<strong>{{ $errors->first('pin') }}</strong>
			</span> 
			@endif

		</div>

		<div class="mb-6">
			<label for="name" class="block  uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Password</label>
			<input type="password" class="bg-white  border-grey-darken-2 border-2 w-full p-2 leading-normal" id="name" name="password" autocomplete="name" placeholder="Your password" value="{{ old('password') }}" required>
		</div>

		<div class="form-group mb-6">
			<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
		</div>


		@if($errors->any())
			<div class="flex bg-red p-3 rounded-md mb-4 ">
				<svg class="fill-current text-white h-6 w-6 mr-4 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
				<p class="font-bold text-md text-white">These credentials do not match our records.
				</p>
			</div>
		@endif

		@if ($errors->has('email'))
				<span class="help-block text-red ">
					<strong>{{ $errors->first('email') }}</strong>
				</span> 
		@endif

		<div class="mb-6" class="text-center">
			<button class="bg-green-theme p-5 w-full text-white font-bold ">Login</button>
		</div>
	</form>
</section>
@endsection
