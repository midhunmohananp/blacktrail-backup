<user-filters inline-template>
	<div>
		<input v-show="group.sortBy === 2" type="text" placeholder="Search by Name" class="form-control p-2">
		<select @change="changeFilterAdmin($event)" v-model="group.sortBy" class="mr-4 h-10 w-1/2x rounded-sm font-basic border-2 mt-2 mb-4">
			<option value="0">Posted by You</option>
			<option value="1">Followed by you</option>
			<option value="2">Country</option>
		</select>	
	</div>
</user-filters>



{{-- <h3>Groups</h3> --}}
