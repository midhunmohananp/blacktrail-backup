@extends('layouts.master')	
@section('title', 'Criminals that are posted by you')
@section('content')
<section class="w-1/3">
	@include("modals.register-criminal")
	
	<p class="ml-2 font-basic tracking-normal text-2xl mb-1 mt-4 font-normal text-black mr-2">Criminals Posted by you
	</p>

	
	<div class="flex ml-2 w-3/4">
		<a href="{{ route('admin.criminals.new-form') }}" class="button flex bg-blue py-4 px-4 pb-2 pt-2 mt-1 font-basic text-white text-sm rounded-sm hover:bg-orange mr-2">
			<svg class="fill-current text-white h-6 ml-2 mr-2 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M15 9h-3v2h3v3h2v-3h3V9h-3V6h-2v3zM0 3h10v2H0V3zm0 8h10v2H0v-2zm0-4h10v2H0V7zm0 8h10v2H0v-2z"/>
			</svg>
			<p class="mt-1 font-basic text-md font-normal">Add New Criminal
			</p>	
		</a>

		<button class="flex bg-red py-4 px-4 pb-2 pt-2 mt-1 font-basic text-white text-sm rounded-sm hover:bg-orange">
			<svg class="fill-current text-white h-6 ml-2 mr-2 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
				<path d="M1 4h2v2H1V4zm4 0h14v2H5V4zM1 9h2v2H1V9zm4 0h14v2H5V9zm-4 5h2v2H1v-2zm4 0h14v2H5v-2z"/>
			</svg>
			<a href="{{ route('admin.criminals') }}" class="mt-1 text-white font-basic text-md font-normal">Browse all Criminals</a>
		</button>

	</div>
	@forelse ($criminals as $criminal)
 	<criminals-view :criminals="{{ strip_tags($criminal) }}" inline-template>
		<article class="timeline-feeds">	
			<div class="flex" id="userProfile">	
				<router-link :to="{ name : 'criminalView', params : { criminalId : criminal.id , criminals : criminal }}" tag="a">
					{{-- <img class="h-18 w-18 rounded-full mr-4 mt-2" src="{{ asset('assets/images/'.$criminal->photo) }}" id="criminalsPhoto"  alt="Criminals View" > --}}

				@if(file_exists(public_path('assets/images/'.$criminal->photo))) 
					<img class="h-18 w-18 rounded-full mr-4 mt-2" src="{{ asset('assets/images/'.$criminal->photo)  }}" id="criminalsPhoto" alt="Criminals View" >
				@else
					<img class="h-18 w-18 rounded-full mr-4 mt-2" src="{{ asset('assets/images/default_avatar.jpg')  }}" id="criminalsPhoto"  alt="Criminals View" >
				@endif
				</router-link>
				<div class="flex-1">
					@verbatim
					<h3 class="mt-4 font-basic">{{  criminal.full_name }}</h3>
					<p class="mt-2">aka <em class="font-basic roman">{{ criminal.alias  }}</em></p>
					@endverbatim
				</div>
			</div>
		</article>
	</criminals-view>
	@empty
	<h3>No Criminals are added yet..</h3>
	@endforelse
	{{ $criminals->links() }}

</section>
{{-- CriminalView.vue --}}

<router-view></router-view>

@endsection


