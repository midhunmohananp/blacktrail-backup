<section class="w-3/5 ml-2 font-basic">
	<p class="font-basic tracking-normal text-2xl mb-4 mt-4 font-normal text-black mr-2">Criminal Profile of {{ $criminal->full_name }}</p>
	<div class="bg-white px-8 py-8 pt-4">
		<div class="text-center">
			<div id="avatar" class="inline-block mb-6" >
				<img @mouseover="showMorePics" src="{{ asset('assets/images/'.$criminal->photo) }}"  class="h-50 w-50 rounded-full border-orange border-2">
				
				<p class="font-bold mt-2 text-blue">$15,000</p>
				<p class="mt-2 text-lg font-bold" >Notable Crimes:
					@foreach ($criminal->crimes as $crime) 
					<p class="mt-2 text-lg font-normal">
						<em class="font-bold roman">{{ $crime->criminal_offense }}</em>{{ $crime->description }}
					</p>
					@endforeach
				</p>

				<div class="w-full flex justify-between">
					<a href="{{ route('admin.criminals.show',$criminal->id) }}" class="w-full bg-green-theme p-3 text-white mt-4 ml-2 hover:bg-green-second" @click="showMap" >View Full Profile
					</a>
					<button class="w-full bg-green-initial p- 3 text-white mt-4 ml-2 hover:bg-green-second" @click="reportCriminalLocation" >Report location
					</button>
					<button class="w-full bg-white p- 3 text-black border-black border-2 hover:text-white rounded-lg mt-4 ml-2 hover:bg-green-second" @click="this.$modal.show('offer-bounty')" >Offer A Bounty
					</button>
				</div>
			</div>
		</div>
	</div>
</section>	



{{-- <section class="w-3/5 ml-2 font-basic">
	<p class="font-basic tracking-normal text-2xl mb-4 mt-4 font-normal text-black mr-2">Criminal Profile {{ $criminal->full_name }}</p>
	<div class="bg-white px-8 py-8 pt-4">
		<div class="text-center">
			<div id="avatar" class="inline-block mb-6" >
				<img @mouseover="showMorePics" src="{{ asset('assets/images/'.$criminal->photo) }}"  class="h-50 w-50 rounded-full border-orange border-2">
				
				<p class="font-bold mt-2 text-blue">$15,000</p>
				<p class="mt-2 text-lg font-bold" >Notable Crimes:
					@foreach ($criminal->crimes as $crime) 
					<p class="mt-2 text-lg font-normal">
						<em class="font-bold roman">{{ $crime->criminal_offense }}</em>{{ $crime->description }}
					</p>
					@endforeach
				</p>
				<div class="w-full flex justify-between">
					<button class="w-full bg-green-theme p-3 text-white mt-4 ml-2 hover:bg-green-second" @click="showMap" >View Full Profile</button>
					<button class="w-full bg-green-initial p- 3 text-white mt-4 ml-2 hover:bg-green-second" @click="reportCriminalLocation" >Report location</button>
					<button class="w-full bg-white p- 3 text-black border-black border-2 hover:text-white rounded-lg mt-4 ml-2 hover:bg-green-second" @click="this.$modal.show('offer-bounty')" >Offer A Bounty
					</button>
				</div>
			</div>
		</div>
	</div>
</section>	 --}}