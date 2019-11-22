@extends('layouts.master')

@section('title', 'All Groups')

@section('content')


<section class="w-1/3 ml-5">

	<p class="font-basic tracking-normal text-3xl mb-4 mt-4 font-normal text-black mr-2">Groups</p>

	@include('partials.filters.groups')
	
	@forelse ($groups as $group)

	<groups-view inline-template :groups="{{ $group }}">
		<article class="timeline-feeds">
			<div class="flex" id="groupPicture">
				<router-link :to="{ name : 'groupView', params : { groupId : group.id , groups : group } }" tag="a">
					<img class="h-18 w-18 rounded-full mr-4 mt-2" src="{{ asset('assets/images/'.$group->default_avatar) }}" alt="Criminals View" >
				</router-link>
				<div class="flex-1">
					<h3 class="mt-4 font-basic text-2xl">{{  $group->full_name }}</h3>
					<p class="mt-2">Motto :  <em class="font-basic font-bold roman">{{ $group->motto  }}</em></p>
				</div>
			</div>
		</article>	
	</groups-view>

	@empty

	<h3>No groups are added yet..</h3>

	@endforelse

	{{ $groups->links() }}

</section>


{{-- GroupView.vue --}}
<router-view></router-view>


@endsection