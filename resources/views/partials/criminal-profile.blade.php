<section class="w-full ml-5 font-basic">
	<p class="font-basic tracking-normal text-2xl mb-4 mt-4 font-normal text-black mr-2">Criminal Profile of {{ $criminals->full_name }}</p>
	<div class="bg-white px-8 py-8 pt-4">
		<div class="text-center">
			<div id="avatar" class="inline-block mb-6" >
				<img @mouseover="showMorePics" src="{{ asset('assets/images/'.$criminals->photo) }}"  class="h-50 w-50 rounded-full">
				
				<p class="mt-2 text-lg font-bold" >Notable Crimes:
					@if($criminals->crimes as $crime) 
					<p class="mt-2 text-lg font-normal"><em class="font-bold roman">{{ $crime->criminals_offense }}</em>{{ $crime->description }}</p>
					@empty
					<h3>No crimes were listed for this person yet</h3>
					<p class="mt-2 text-lg font-normal"><em class="font-bold roman">{{ $crime->criminals_offense }}</em>{{ $crime->description }}</p>
					@endif
				</p>

				<div class="w-full flex justify-between">
					<button class="w-full bg-green-theme p-2 h-10 text-md text-white mt-4 ml-2 hover:bg-green-second" @click="showMap">Sightings</button>
					<button class="w-full bg-green-initial p-2 h-10 text-md text-white mt-4 ml-2 hover:bg-green-second" @click="reportCriminalLocation">Report location</button>
					<button class="w-full bg-white p-2 h-10 text-md text-black border-black border-2 hover:text-white mt-4 ml-2 hover:bg-green-second" @click="offerBounty" >Offer A Bounty
					</button>
				</div>
				
			</div>
		</div>

		<div id="criminals-information" class="some-page-wrapper">
			<div class="row">
				<div class="ml-2 mr-1 column">
					Listed Name<p class="text-lg mb-2 font-bold">{{  $criminals->full_name }}</p>
					Alias / aka<p class="text-lg mb-2 font-bold"> {{$criminals->alias }} </p>
					First Name  <p class="text-lg mb-2 font-bold">{{$criminals->first_name }} </p>
					Middle Name  <p class="text-lg mb-2 font-bold">{{$criminals->middle_name }} </p>
					Last Name <p class="text-lg mb-2 font-bold"> {{$criminals->last_name }} </p>
				</div>

				@if (is_null($criminals->profile))
				<h3>No criminals Profile yet for this person</h3>
				@else
				<div class="column mr-4">
					Status<p class="text-lg mb-2 font-bold"> {{ $criminals->status === 0 ? 'Captured' : 'At Large / Free' }} </p>
					Birthplace<p class="text-lg mb-2 font-bold">{{ $criminals->profile->birthplace }}</p>
					Birthdate <p class="text-lg mb-2 font-bold">{{ $criminals->profile->birthdate }}</p>
					Age  <p class="text-lg mb-2 font-bold">{{ $criminals->profile->age }}</p>
					Last Seen <p class="text-lg mb-2 font-bold">{{  $criminals->profile->last_seen }}</p>
				</div>	
				<div class="column">
					Eye Color<p class="text-lg mb-2 font-bold">{{  ucwords($criminals->profile->eye_color) }}</p>
					Weight (Kilos)<p class="text-lg mb-2 font-bold">{{  $criminals->profile->weight_in_kilos }} </p>
					Height<p class="text-lg mb-2 font-bold">{{  $criminals->profile->height_in_feet_and_inches	 }}</p>
					Country of Origin<p class="text-lg mb-2 font-bold">{{  $criminals->profile->country_of_origin	 }} </p>
					Body Frame<p class="text-lg mb-2 font-bold">{{  ucwords($criminals->profile->body_frame)	 }} </p>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
</section>