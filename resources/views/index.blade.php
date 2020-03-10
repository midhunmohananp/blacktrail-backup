@extends('layouts.master')

@section('title', 'Be a bounty hunter now, Earn money by finding wanted criminals in your area')

@section('content')

<div class="px-4 mt-4">

	<flash-message message="Lorem ipsum dolor."></flash-message>

	{{-- If user is authenticated --}}
	@auth

	<h3 class="text-2xl mb-2 font-basic font-medium ">Welcome to Blacktrail, {{ $displayName }}
	</h3>
	
	<main-navigation :user="{{ auth()->user() }}"></main-navigation>

	<p class="mt-8 font-normal font-basic text-2xl">{{ trans('slots.intro_text') }}</p>

	@if (auth()->user()->role_id === 3 )
	<ol class="mt-4">
		<li class="font-basic">Find criminals hunted by the government </li>
		<li class="font-basic">Report immediately to the law enforcers the fugitives location and claim the criminal's bounty </li>
		<li class="font-basic">
			You can add more bounty for a specific criminal offender / fugitive, if you want him to be captured right away...
		</li>
	</ol>

	@endif
	

	@endauth

	{{-- If user isn't logged on. --}}
	@guest

	<section class="w-full mt-8 m-auto h-full">	
		<h3 class="text-2xl mb-2 font-basic font-medium font-bold">Welcome to Blacktrail
		</h3>

		<div class="flex mt-4 text-2xl">

			<a href="/register" class="mr-2 font-bold tracking-wide underline text-blue text-md">Create An Account</a>

			<a href="/login" class="mr-2 font-bold tracking-wide underline text-blue text-md">Login to your account</a>


		</div>


		<p class="mt-8 font-normal font-basic text-2xl">{{ trans('slots.intro_text') }}</p>

		<ol class="mt-4">
			<li class="font-basic">
				Help hunt the criminals & fugitives who are hunted by the law enforcement agencies all over the world. 
			</li>
			<li class="font-basic">Report immediately to the law enforcers and get the reward bounty
			</li>
			<li class="font-basic">Offer more gold/bounty for a specific fugitive's head. The bigger his bounty, the easier he will be captured</li>
		</ol>
	</section>
	
	@endguest
</div>


<flash-message message="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, sequi.">
</flash-message>

@endsection