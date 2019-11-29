<report-criminal inline-template>
	<modal name="report-criminal" height="auto">
		<div class="ml-4 p-4 w-full bg-white" class="some-page-wrapper">
			<form @submit.prevent="reportCriminal" class="font-basic">
				<h3>Report Criminal</h3>
				<div class="mt-2 mb-2">
					<label for="name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Your Name</label>
					<input v-model="form.reporters_name" type="text" value="{{ $displayName }} " class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Username / Email" value="{{ old('name') }}" required>
				</div>

				<div class="mb-2">
					<label for="name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Your Contact Number</label>
					<input type="text" v-model="form.contact_number" class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Contact Number of you" value="{{  auth()->user()->phone_number }}" required>
				</div>	

				<div class="mb-2">
					<div class="flex">
						<label for="name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Criminal's Location</label>
						<svg xmlns="http://www.w3.org/2000/svg" @click="showMap" class=" ml-2 -mt-1 fill-current text-blue h-4 w-4" viewBox="0 0 576 512">
							<path d="M288 0c-69.59 0-126 56.41-126 126 0 56.26 82.35 158.8 113.9 196.02 6.39 7.54 17.82 7.54 24.2 0C331.65 284.8 414 182.26 414 126 414 56.41 357.59 0 288 0zm0 168c-23.2 0-42-18.8-42-42s18.8-42 42-42 42 18.8 42 42-18.8 42-42 42zM20.12 215.95A32.006 32.006 0 0 0 0 245.66v250.32c0 11.32 11.43 19.06 21.94 14.86L160 448V214.92c-8.84-15.98-16.07-31.54-21.25-46.42L20.12 215.95zM288 359.67c-14.07 0-27.38-6.18-36.51-16.96-19.66-23.2-40.57-49.62-59.49-76.72v182l192 64V266c-18.92 27.09-39.82 53.52-59.49 76.72-9.13 10.77-22.44 16.95-36.51 16.95zm266.06-198.51L416 224v288l139.88-55.95A31.996 31.996 0 0 0 576 426.34V176.02c0-11.32-11.43-19.06-21.94-14.86z"/>
						</svg>
					</div>
					<input type="text" class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="You can click on the map icon to show the map"  required>
				</div>	


				<div class="mb-2 w-3/4">
					<label for="name" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Criminal's Location Details</label>
					<wysiwyg inputId="editor1" content="content"></wysiwyg>	

					{{-- 	<input type="text" class="bg-grey-lighter w-3/4 mb-2 p-4 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Username / Email" value="{{  auth()->user()->phone_number }}" required> --}}
				</div>


				
				<div class="mb-2 ">
					<button type="submit" class="p-2 bg-green-theme w-3/4 font-bold text-white">Report now</button>
				</div>
			</form>
		</div>
	</modal>
</report-criminal>