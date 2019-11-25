<user-filters inline-template>	
	<div class="bg-white mb-4 w-4/5 mt-4 px-4 py-4 rounded-sm">
		<h3 class="font-basic text-2xl mt-2">Search for Criminals Here</h3>
		<div class="flex w-full">

			<select placeholder="Sort By" v-model="criminal.sortBy" class="bg-grey-lightest border p-2 border-gray mr-4 h-10 w-1/2 rounded-sm font-basic mt-2 mb-4">
				{{-- <option value="" selected>Sort By</option> --}}
				<option>----------------------------</option>
				<option value="1">Most Wanted</option>
				<option value="2">Last Seen</option>
				<option value="3">Very Popular</option>
				<option value="4">Sort By Bounty/Reward</option>
			</select>

			<select placeholder="Country of Origin" v-model="criminal.country" class="bg-grey-lightest border p-2 border-gray mr-4 h-10 w-full rounded-sm font-basic mt-2 mb-4">
				<option >--------------</option>
				@foreach ($countries as $country)
				<option value="{{  $country->id }}">{{ $country->name }}</option>
				@endforeach
			</select>
		</div>
		<p class="font-bold text-md">or</p>
		<div class="flex">
			{{-- <label for="name">Search by Name</label> --}}
			<input placeholder="Search by Name" type="text" v-model="criminal.name" class="bg-grey-lightest border p-2 border-gray mr-4 h-10 w-full rounded-sm font-basic mt-2 mb-4">
		</div>

		<div class="flex text-center" style="margin-top:3px; ">
			<button class="bg-blue p-2 h-10 mt-2 w-3/5 text-white hover:bg-black flex">
				<svg xmlns="http://www.w3.org/2000/svg" class="text-center fill-current text-white h-4 w-6" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
				</svg>
				<div class="text-center flex">
					<p class="ml-4 font-bold text-center">Search</p>
				</div>
			</button>
		</div>
	</div>
</user-filters>
