<criminals-view inline-template :criminals="{{  $criminal }}">
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