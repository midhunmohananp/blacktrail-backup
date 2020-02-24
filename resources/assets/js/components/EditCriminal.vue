<template>
	<section class="w-full ml-12">
		<p class="font-basic tracking-normal text-3xl mb-4 mt-4 font-normal text-black ml-6">Edit Criminal Page
		</p>
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
						<places
						v-model="form.birthplace"
						class="bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin"
						placeholder="Enter the full location details"
						@change="val => { form.birthplace = val }">
					</places>
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
					<datepicker input-class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" :value="criminal.profile.birthdate" format="YYYY-M-D" name="date2"></datepicker>
				</div>
				<div id="input-group" class="ml-4 w-3/5">	
					<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Eye Color 
					</label>
					<input type="text" :value="criminal.profile.eye_color" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
				</div>
			</div>
			<div class="flex inline-block">
				<div id="input-group" class="w-3/5">	
					<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Weight In Kilos / Lbs ( Just specify )
					</label>
					<input type="text" class="hover:bg-grey-lightest bg-grey-lighter mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="any number like 50" required>
				</div>

				<div id="input-group" class="ml-4 w-3/5">	
					<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Height(in cm)
					</label>
					<input placeholder="168cm" type="text" :value="criminal.profile.height_in_feet_and_inches" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" required>
				</div>
			</div>
			
			<div class="w-full flex">
				<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">List all the Attributes
				</label>
				<span>
					<i class="fas fa-plus-circle h-4 w-4 text-grey-darker" @click="add(k)" v-show="k == inputs.length-1">
					</i>
				</span>
			</div>
			
			<div class="w-full flex inline-block" v-for="(input,k) in inputs" :key="k">
				<!-- if there's no crimes for this person -->
				<div v-if="criminal.crimes.length === 0" class="flex inline-block w-full">
					<select v-model="inputs.crime_id" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal">
						<option v-for="crimes in crimes">{{ crimes.criminal_offense }} </option>
					</select>
					<div id="input-group" class="ml-4 w-3/5">			
						<input type="text" v-model="inputs.name" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Attribute Details" required>
					</div>
					<span>
						<i class="fas fa-minus-circle" @click="remove(k)" v-show="k || ( !k && inputs.length > 1)">
						</i>
						<i class="fas fa-plus-circle" @click="add(k)" v-show="k == inputs.length-1">
						</i>
					</span>
				</div>
				<div class="w-full inline-block" v-else>
					<div v-for="(ccrime,i) in criminal.crimes">
						<!-- <p>{{ crimes.criminal_offense }} </p> -->
						<div class="flex inline-block">
							<select v-model="criminal.crimes[i].criminal_offense" class="hover:bg-grey-lightest bg-grey-lighter w-1/3 mb-2 p-2 leading-normal">
								<option v-for="crime in crimes" :value="crime.criminal_offense">{{ crime.criminal_offense }} </option>
							</select>
							<div class="flex inline-block w-full">
								<div id="input-group" class="ml-4 w-full">			
									<input type="text" :value="ccrime.description" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Crime Details" required>
								</div>
								<span class="mr-2">
									<i class="fas fa-minus-circle" @click="remove(k)" v-show="k || ( !k && inputs.length > 1)">
									</i>
									<i class="fas fa-plus-circle" @click="add(k)" v-show="k == inputs.length-1">
									</i>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 	<div v-if="criminal.crimes.length > 0">
					<p>less than 1</p>
				</div>
				<div v-else>
					
				</div> -->


				<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Complete Background and Details
				</label>
				<div class="flex inline-block">
					<VueTrix
					class="editor1" 
					inputId="editor1"
					@trix-change="handleEditorChange"
					@trix-attachment-remove="handleAttachmentRemove"
					@trix-attachment-add="handleAttachmentAdd"
					v-model="form.complete_description"
					/>
				</div>

				<div class="mt-2 w-3/4">
					<button type="submit" class="p-4 hover:bg-purple bg-blue w-3/4 font-bold text-white">Save Criminal</button>
				</div>
			</form>
		</div>	
	</div>
</section>
</template>
<script>
	import api from "./scripts/api.js";
	import urls from "./scripts/endpoints.js";
	import Places from 'vue-places';
	import VueTrix from "vue-trix";
	import datepicker from 'vue-date-picker';
	import _ from "lodash"; 
	export default { 
		props : ['crimes','criminal','admins','countries'],
		components : { 
			'VueTrix' : VueTrix,
			'places' : Places, 
			'datepicker' : datepicker
		}, 
		methods : {
			isEmpty(obj) {
				return !obj || Object.keys(obj).length === 0;
			},
			add(index) {
				this.inputs.push({ name: '' });
			},
			remove(index) {
				this.inputs.splice(index, 1);
			},
			handleAttachmentAdd(event){
				console.log(event);
				const attachment = event.attachment;

				if(!attachment.file){
					return;
				}

				this.uploadAttachment(attachment.file, setProgress, setAttributes);

				function setProgress(progress) {
					attachment.setUploadProgress(progress)
				}

				function setAttributes(attributes) {
					attachment.setAttributes(attributes)
				}

		/*var attachment = event.attachment;
		console.log(attachment);
		if (attachment.file){		
			const data = attachment;
			const config = {
				onUploadProgress: progressEvent => {
					var progress = progressEvent.loaded / progressEvent.total * 100;
					attachment.setUploadProgress(progress);
				}
			}

			axios.post(this.send_attachment_endpoint,data,config)
			.then((response) => {
				console.log("Response is:");
				console.log(response);
				if (response.status === 201) {
					setTimeout(function() {
						var url = response.data;
						attachment.setAttributes({ url: url, href: url });
					}, 30)
				}
				console.log(response.data);
			}).catch(error => console.log(error));
				attachment.setUploadProgress(10);
				setTimeout(function(e) {
					console.log("Set TimeOut:");
					console.log(e);
					// var url = xhr.responseText;
					// return attachment.setAttributes({ url: url, href: url });
				}, 30)
		}
		else { 
			return response("No file uploaded here",401);
		}*/

	}, 

/*async handleAttachmentAdd(evt){
let file = evt.attachment.file
let form = new FormData()
form.append('Content-Type', file.type)
form.append('image', file)
const resp = await this.$store.dispatch('imageUpload', form)
evt.attachment.setUploadProgress(100)
console.log(resp)
evt.attachment.setAttributes({
	url: resp.data.url,
	href: resp.data.url
})
},*/

handleEditorChange(file){
	console.log('file',file);
},

handleAttachmentRemove(file){
	console.log("Trying to delete");
	let url = file.attachment.attachment.attributes.values.url.split("/").pop();
	console.log(url);
	axios.delete(this.remove_attachment_endpoint + `${url}`).then(response => {
		console.log(response);
	}).catch(error => {
		console.log(error);
	});
},


},

data(){
	return { 

		inputs: [
		{
			crime_id : 0, 
			name: ''
		}
		],
		country : this.criminal.country_id,
		form : {
			birthplace : "",
			status : 0, 
			maxFiles: 1,
			complete_description : this.criminal.profile.complete_description,
			currency : 1,
			placeholder:  "Well..",
			alias : "",
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
.trix-content {
	height: 500px;
	overflow-y: auto;
}
/*.vue_component__upload--image
.upload_image_form__thumbnails
.upload_image_form__thumbnail [&.bad-size, &.uploaded]
.img [&.show, &:hover]
span*/
</style>

