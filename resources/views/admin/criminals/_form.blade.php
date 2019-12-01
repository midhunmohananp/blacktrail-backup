{{ csrf_field() }}
<div class="mt-4">
	<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Criminal's Name
	</label>
	<input name="full_name" v-model="form.criminals_name" type="text" value="" class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Criminal Name" value="{{ old('full_name') }}" >	
</div>

<div class="mb-2">
	<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Alias / Aka: </label>
	<input name="first_name" type="text"  v-model="form.alias"  value="{{  old('alias') }}" class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Alias" required>
</div>	

<div class="mb-2">
	<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">If found, Report this to:
	</label>
	<select name="country" v-model="form.contact_person" class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" >
		@foreach ($admins as $admin)
		<option value="{{  $admin->id }}">{{  $admin->display_name }}</option>
		@endforeach
	</select>
</div>	


<div class="mb-2">
	<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Contact Number</label>
	<input name="phone_number" v-model="form.contact_number" type="text"  class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Alias" required>
</div>	

<div class="mb-2">
	<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Initial Bounty</label>
	<input name="number" v-model="form.bounty" type="text" class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Alias" required>
</div>	

<div class="mb-2">
	<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Currency</label>
	<select name="country" v-model="form.currency" class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="">
		@foreach ($countries as $country)
		<option value="{{  $country->currency_code }}">{{  $country->name }}  {{  $country->currency_code }}  - {{  $country->currency_symbol }}</option>
		@endforeach
	</select>
</div>	

<div class="mb-2">
	<div class="flex inline-block">
		<div id="input-group" class="w-full">	
			<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Upload a picture of this criminal
			</label>
			<div class="card-body">
				<div class="row">
					<div class="col-md-3" v-if="form.image">
						<img :src="form.image" class="img-responsive" height="70" width="90">
					</div>
					<div class="col-md-6">
						<input type="file" v-on:change="onImageChange" class="form-control">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	





	{{-- <upload-image is="upload-image"
	:url="form.uploadUrl"
	:max_files="form.maxFiles"
	></upload-image> --}}
	<div class="mb-2">
		<div class="flex">
			<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Criminal Last Seen
			</label>
			<svg xmlns="http://www.w3.org/2000/svg"  class=" ml-2 -mt-1 fill-current text-blue h-4 w-4" viewBox="0 0 576 512">
				<path d="M288 0c-69.59 0-126 56.41-126 126 0 56.26 82.35 158.8 113.9 196.02 6.39 7.54 17.82 7.54 24.2 0C331.65 284.8 414 182.26 414 126 414 56.41 357.59 0 288 0zm0 168c-23.2 0-42-18.8-42-42s18.8-42 42-42 42 18.8 42 42-18.8 42-42 42zM20.12 215.95A32.006 32.006 0 0 0 0 245.66v250.32c0 11.32 11.43 19.06 21.94 14.86L160 448V214.92c-8.84-15.98-16.07-31.54-21.25-46.42L20.12 215.95zM288 359.67c-14.07 0-27.38-6.18-36.51-16.96-19.66-23.2-40.57-49.62-59.49-76.72v182l192 64V266c-18.92 27.09-39.82 53.52-59.49 76.72-9.13 10.77-22.44 16.95-36.51 16.95zm266.06-198.51L416 224v288l139.88-55.95A31.996 31.996 0 0 0 576 426.34V176.02c0-11.32-11.43-19.06-21.94-14.86z"/>
			</svg>
		</div>
		<input v-model="form.last_seen" name="address_1" type="text" id="address-input" class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="You can click on the map icon to show the map" required>
	</div>	

	<div class="mb-2">
		<div class="flex">
			<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Status</label>
		</div>
		<select v-model="form.status" name="status" class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="">
			<option value="0">Captured</option>
			<option value="1">At Large</option>
		</select>
	</div>	

	<div class="mb-2">
		<div class="flex">
			<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Country of Origin
			</label>
		</div>
		<select v-model="form.country_id" name="country" class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="">
			@foreach ($countries as $country)
			<option value="{{  $country->id }}">{{  $country->name }}</option>
			@endforeach
		</select>
	</div>	

	<div class="mb-2 w-3/4">
		<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Complete Background and Details
		</label>
		<VueTrix v-model="form.complete_description" class="editor1" placeholder="Enter Content"/>
	</div>

	<div class="mb-2">
		<button type="submit" class="p-4 hover:bg-purple bg-blue w-3/4 font-bold text-white">{{ $buttonText ?? 'Save Criminal' }}</button>
	</div>