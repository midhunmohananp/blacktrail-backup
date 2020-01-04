<template>
	<section class="w-full ml-12">
		<p class="font-basic tracking-normal text-3xl mb-4 mt-4 font-normal text-black ml-6">Edit Criminal Page</p>
		<div class="bg-white p-6 shadow-md w-3/4">
			<form id="setup-billing-form" action="user/billing" method="POST">
				<div class="input-group mb-6">
					<h3 class="text-lg font-sans">Update Criminal Information of {{ criminal.full_name }}</h3>
				</div>
				<div class="flex inline-block mt-4">
					<div id="input-group" class="w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Criminals' Full / Display Name
						</label>	
						<input type="text" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" :value="criminal.full_name" autocomplete="name" placeholder="5000" required>
					</div>

					<div id="input-group" class="ml-2 w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">
							Alias
						</label>
						<input type="text" :value="criminal.alias" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
				</div>
				<div class="flex inline-block">
					<div id="input-group" class="w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">First Name
						</label>	
						<input type="text" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" :value="criminal.first_name" autocomplete="name" placeholder="5000" required>
					</div>
					<div id="input-group" class="ml-2 w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">
							Middle Name
						</label>
						<input type="text" :value="criminal.middle_name" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
					<div id="input-group" class="ml-2 w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">
							Last Name
						</label>
						<input type="text" :value="criminal.last_name" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
				</div>

				<div class="flex inline-block">
					<div id="input-group" class="w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Contact Number
						</label>
						<input type="text" :value="criminal.contact_number" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>

					<div id="input-group" class="ml-2 w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Status
						</label>
						<select v-model="form.status" class="bg-grey-lighter w-full mb-2 p-2 leading-normal" name="" id="" >
							<option value="1">At Large</option>
							<option value="0">Captured</option>							
						</select>
					</div>
				</div>

				<div class="flex inline-block">
					<div id="input-group" class="w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Birthplace
						</label>
						<input type="text" :value="criminal.profile.birthplace" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>

					<div id="input-group" class="ml-4 w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Last Seen in 
						</label>
						<input type="text" :value="criminal.profile.last_seen" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
				</div>

				<div class="flex inline-block">
					
					<div id="input-group" class="w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Birthdate
						</label>
						<input type="text" :value="criminal.profile.birthdate" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Date/Month/Year" required>
					</div>

					<div id="input-group" class="ml-4 w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Eye Color 
						</label>
						<input type="text" :value="criminal.profile.eye_color" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
				</div>

				<div class="flex inline-block">
					<div id="input-group" class="w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Weight In Kilos
						</label>
						<input type="text" :value="criminal.profile.weight_in_kilos" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="any number like 50" required>
					</div>

					<div id="input-group" class="ml-4 w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Height(in cm)
						</label>
						<input placeholder="168cm" type="text" :value="criminal.profile.height_in_feet_and_inches" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" required>
					</div>
				</div>

				<div class="flex inline-block">
					<div id="input-group" class="w-full">	
						<label for="name" class="block tracking-wide text-black-v2 text-xs font-bold mb-2">Complete Description
							<VueTrix
							class="editor1" 
							inputId="editor1"
							@trix-attachment-remove="handleAttachmentRemove"
							@trix-attachment-add="handleAttachmentAdd"
							v-model="form.complete_description"
							/>
						</label>
					</div>
				</div>

				<div class="mt-4 flex inline-block">
					<div id="input-group" class="w-full">	
						<button class="bg-blue text-white p-4 w-full">Submit</button>
					</div>
				</div>
			

</form>
			<!-- {{-- <form method="POST" action="#" class="font-basic ml-6 mt-2 p-2">
			<h3>Edit Criminal : {{  criminal.full_name }}</h3>
			<div class="flex">
				<div class="mt-4">
					<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Display Name</label>
					<input name="full_name" :value="{{  criminal.full_name }}" type="text" class="bg-grey-lighter w-3/5 mb-2 p-2 leading-normal" name="full_name" placeholder="Criminal Name">	
				</div>	
				
				<div class="mt-4">
					<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Alias</label>
					<input name="full_name" :value="{{  criminal.alias }}" type="text" class="bg-grey-lighter w-3/5 mb-2 p-2 leading-normal" name="full_name" placeholder="Criminal Name" >	
				</div>	
			</div>

			<div class="mt-4">
				<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">First Name</label>
				<input name="full_name" :value="{{  criminal.first_name }}" type="text" class="bg-grey-lighter w-1/2 mb-2 p-2 leading-normal" name="full_name" placeholder="Criminal Name" >	
			</div>		

			<div class="mt-4">
				<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Middle Name</label>
				<input name="full_name" :value="{{ criminal.middle_name }}" type="text" class="bg-grey-lighter w-1/2 mb-2 p-2 leading-normal" name="full_name" placeholder="Middle Name" >	
			</div>
		</form> -->
	</div>
</section>
</template>
<script>
import api from "./scripts/api.js";
import urls from "./scripts/endpoints.js";
import Places from 'vue-places';
import VueTrix from "vue-trix";
import _ from "lodash"; 
	export default { 
		props : ['criminal','admins','countries'],
		components : { 
			'VueTrix' : VueTrix,
			'places' : Places, 
		}, 
		methods : {
			fetchCountries(){

			}
		},

		data(){
			return { 
				country : this.criminal.country_id,
				form : {
					status : 0, 
					maxFiles: 1,
					complete_description : this.criminal.profile.complete_description,
					currency : 1,
					placeholder:  "Well..",
					alias : "",
					status : 1 , 
					bounty : "",
					last_seen : "",
					contact_person : api.user.id , 
					criminals_name : "",
				// contact_number : api.user.phone_number , 
					contact_number : "",
					attachments : [],
					country_id : 4 , 
					uploadUrl: urls.urlSaveCriminal,
				},
				posted_by : this.criminal.posted_by,
				max_files: { // total # of files allowed to be uploaded
					type: Number,
					required: false,
					default: 10
				}

	/*		input_id: { // Id of upload control
	type: String,
	required: false,
	default: "default"
	},
	url: { // upload url
	type: String,
	required: true,
	default: null
	},
	name: { // name to use for FormData
	type: String,
	required: false,
	default: 'images[]'
	},
	max_batch: { // # of files to upload within one request
	type: Number,
	required: false,
	default: 0
	},
	max_files: { // total # of files allowed to be uploaded
	type: Number,
	required: false,
	default: 10
	},
	max_filesize: { // max files size in KB
	type: Number,
	required: false,
	default: 8000
	},
	resize_enabled: { // resize image prior to preview/upload
	type: Boolean,
	required: false,
	default: false
	},
	resize_max_width: { // resize max width
	type: Number,
	required: false,
	default: 800
	},
	resize_max_height: { // resize max height
	type: Number,
	required: false,
	default: 600
	},
	button_html: { // text/html for button
	type: String,
	required: false,
	default: 'Upload Images'
	},
	button_class: { // classes for button
	type: String,
	required: true,
	default: 'bg-grey-darker p-2'
	}
	*/
}
}	
};
</script>
<style>
.trix-content{
	height: 500px;
	overflow-y: auto;
}
/*.vue_component__upload--image
.upload_image_form__thumbnails
.upload_image_form__thumbnail [&.bad-size, &.uploaded]
.img [&.show, &:hover]
span*/
</style>

