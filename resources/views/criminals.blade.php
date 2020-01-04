@extends('layouts.master')
@section('title', 'All Wanted Criminals')

@section('content')

@auth

@if ( auth()->user()->role_id === 3)

@include('modals.report-criminal')
@include('modals.location-map')

<section class="w-1/2x">
	<div class="ml-8">
		<p class="font-basic tracking-normal text-3xl mb-4 mt-4 font-normal text-black mr-2">All Wanted Criminals
		</p>
		@include('partials.filter',['countries'=> $countries])		
	</div>
	
	@forelse ($criminals as $criminal)	
		<criminals-view :criminals="'{{ json_encode($criminals) }}'" inline-template> 
			<article class="timeline-feeds">	
				<div class="flex" id="userProfile">	
					<router-link :to="{ name : 'criminalView', params : { criminalId : criminal.id , criminals : criminal }}" tag="a">
						<img class="h-18 w-18 rounded-full mr-4 mt-2" src="{{ asset('assets/images/'.$criminal->photo) }}" id="criminalsPhoto"  alt="Criminals View" >
					</router-link>
					{{-- showing the names of the criminals --}}
					<div class="flex-1">
						@verbatim
						<h3 class="mt-4 font-basic">{{  criminal.full_name }}</h3>
						<p class="mt-2">aka <em class="font-basic roman">{{ criminal.alias  }}</em></p>
						@endverbatim
					</div>
				</div>
			</article>
	</criminals-view>
		{{-- @include("partials.criminals-view", ['criminals' => $criminal]) --}}
	@empty
		<h3>No Criminals are added yet..</h3>
	@endforelse

	{{ $criminals->links() }}
</section>

{{--CriminalView.vue  --}}
<router-view></router-view>

@endif
@endauth
@guest
<section class="w-1/2 ml-5 mt-4">
	<h5 class="text-center text-xl font-light font-basic ml-2">Please<a class="ml-2 underline font-basic text-blue font-bold" href="login">sign in</a> first to browse criminals</h5>
</section>

@endguest


{{-- 
<section class="w-1/2 ml-5">
	<p class="font-display mt-4 mb-4 font-bold">Criminals List</p>

	<div class="container mx-auto">
		@forelse ($criminals as $criminal)
		<section class="bg-white w-1/2 p-4 mb-4 rounded-lg">	
			<article class="w-full text-center list-reset">
				<li class="w-12 inline-block"><a class="font-basic text-large">{{  $criminal->full_name }} <p>aka</p>  </a></a><p class="italic font-italic">{{  $criminal->alias }}</p></li> 
			</article>
		</section>
		@empty 
		
		<h3>No Criminals</h3>
		
		@endforelse
	</div>
</section>
--}}



{{-- <div class="max-w-md mt-4 w-full lg:flex">
	<div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/img/card-left.jpg')" title="Woman holding a mug">
	</div>
	<div class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
		<div class="mb-8">
			<p class="text-sm text-grey-dark flex items-center">
				<svg class="fill-current text-grey w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
					<path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
				</svg>
				Members only
			</p>
			<div class="text-black font-bold text-xl mb-2">Can coffee make you a better developer?</div>
			<p class="text-grey-darker text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>
		</div>
		<div class="flex items-center">
			<img class="w-10 h-10 rounded-full mr-4" src="https://pbs.twimg.com/profile_images/885868801232961537/b1F6H4KC_400x400.jpg" alt="Avatar of Jonathan Reinink">
			<div class="text-sm">
				<p class="text-black leading-none">Jonathan Reinink</p>
				<p class="text-grey-dark">Aug 18</p>
			</div>
		</div>
	</div>
</div>
--}}

@endsection

@section('js')
{{-- <script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
	function convert_currency(){

	}
</script> --}}
@endsection