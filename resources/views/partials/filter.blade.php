<user-filters inline-template>	
	<div>
		<div class="ml-2">
			<div class="flex">
				<select v-model="criminal.sortBy" class="border p-2 border-gray mr-4 h-10 w-1/3x rounded-sm font-basic mt-2 mb-4">
					<option>Sort By</option>
					<option>----------------------------</option>
					<option value="1">Most Wanted</option>
					<option value="2">Last Seen</option>
					<option value="3">Very Popular</option>
					<option value="4">Sort By Bounty/Reward</option>
				</select>
			</div>
		</div>
		<div class="flex" style="margin-top:-16px ; ">
			<button style="width: 30%;" class="bg-blue p-2 h-10 mt-2 w-1/4 text-white hover:bg-black flex">
				<svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white h-4 w-6" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
				</svg>
				<div class="text-center items-center flex" >
					<p class="ml-4">Search</p>
				</div>
			</button>
		</div>
	</div>
</user-filters>
