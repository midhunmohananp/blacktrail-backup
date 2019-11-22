<user-filters inline-template>
	<div>
		<input v-show="group.sortBy === 3" type="text" placeholder="Search by Name" class="form-control p-2">
		<select v-model="group.sortBy" class="mr-4 h-10 w-1/2x rounded-sm font-basic border-2 mt-2 mb-4">
			<option value="1">Most Popular</option>
			<option value="2">Name</option>
			<option value="3">Country</option>
			<option value="4">Success Rate</option>
		</select>	
	</div>
	<div class="flex" style="margin-top:-16px ; ">
		<button style="width: 30%;" @click="criminalSearch" class="bg-blue p-2 h-10 mt-2 w-1/4 text-white hover:bg-black flex">
			<svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white h-4 w-6" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
			</svg>
			<div class="text-center items-center flex" >
				<p class="ml-4">Search</p>
			</div>
		</button>
	</div>
</user-filters>



{{-- <h3>Groups</h3> --}}
