e<template>
	<div class="ml-4 mt-4 p-4 w-1/2 bg-white">
		<form @submit.prevent="registerCriminal" method="POST" class="font-basic pt-4 py-4 ml-3 w-full">
			<h3>Register Criminal</h3>
			<div class="flex inline-block">

				<div class="mt-4 w-1/2 mr-1">
					<label for="criminals_name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">First Name
					</label>
					<input v-model="form.first_name" name="first_name" type="text" class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="pin" autocomplete="first_name" placeholder="First Name" value="" >	
				</div>

				<div class="mt-4 w-1/2">
					<label for="criminals_name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Last Name
					</label>
					<input v-model="form.last_name" name="last_name" type="text" class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="pin" autocomplete="last_name" placeholder="Last Name" value="" >	
				</div>
			</div>

			<div class="mb-2">
				<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Alias / Aka: </label>
				<input v-model="form.alias" name="alias" type="text" class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="pin" autocomplete="name" placeholder="Alias" required>
			</div>	

			<div class="mb-2">
				<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">If found, Report this to:
				</label>
				<select v-model="form.posted_by" name="posted_by"  class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" >
					<option v-for="admin in admins" :value="admin.id" v-text="admin.display_name"></option>
				</select>
			</div>	

			<div class="mb-2">
				<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Contact Number</label>
				<input v-model="form.contact_number" name="phone_number" type="text"  class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="pin" autocomplete="name" placeholder="Alias" required>
			</div>	

			<div class="mb-2">
				<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Initial Bounty</label>
				<input v-model="form.bounty" name="bounty" type="text" class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="pin" autocomplete="name" placeholder="Alias" required>
			</div>

			<div class="mb-2">
				<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Currency</label>
				<select v-model="form.currency" name="currency"  class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="">
					<!-- @foreach ($countries as $country) -->
					<option v-for="country in countries" v-bind:value="country.currency_code">
						{{  country.name }}  {{  country.currency_code }}  - {{  country.currency_symbol }}
					</option>
					<!-- @endforeach -->
				</select>
			</div>	

			<div class="mb-2">
				<div class="flex inline-block mt-4">
					<div id="input-group" class="w-1/2">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Upload a photo of this criminal : 
						</label>
						<div class="card-body">
							<div class="row">
								<div class="col-md-3" v-if="form.avatar">
									<img :src="form.avatar" class="img-responsive" height="70" width="90">
								</div>
								<div class="col-md-6">
									<input type="file" v-on:change="onAvatarChange" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="mb-2">
				<div class="flex">
					<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Criminal Last Seen
					</label>
					<svg xmlns="http://www.w3.org/2000/svg"  class=" ml-2 -mt-1 fill-current text-blue h-4 w-4" viewBox="0 0 576 512">
						<path d="M288 0c-69.59 0-126 56.41-126 126 0 56.26 82.35 158.8 113.9 196.02 6.39 7.54 17.82 7.54 24.2 0C331.65 284.8 414 182.26 414 126 414 56.41 357.59 0 288 0zm0 168c-23.2 0-42-18.8-42-42s18.8-42 42-42 42 18.8 42 42-18.8 42-42 42zM20.12 215.95A32.006 32.006 0 0 0 0 245.66v250.32c0 11.32 11.43 19.06 21.94 14.86L160 448V214.92c-8.84-15.98-16.07-31.54-21.25-46.42L20.12 215.95zM288 359.67c-14.07 0-27.38-6.18-36.51-16.96-19.66-23.2-40.57-49.62-59.49-76.72v182l192 64V266c-18.92 27.09-39.82 53.52-59.49 76.72-9.13 10.77-22.44 16.95-36.51 16.95zm266.06-198.51L416 224v288l139.88-55.95A31.996 31.996 0 0 0 576 426.34V176.02c0-11.32-11.43-19.06-21.94-14.86z"/>
					</svg>
				</div>
				<places
				v-model="form.country.label"
				class="bg-grey-lighter w-3/4 mb-2 p-2 leading-normal" id="pin"
				placeholder="Enter the full location details"
				@change="val => { form.country.label = val }">
			</places>
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
				<option v-for="country in countries" :value="country.id">{{  country.name }}</option>
			</select>
		</div>	
		
		<div class="mb-2">
			<div class="flex">
				<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Bound Value of Trix
				</label>
			</div>
			<textarea class="bg-grey-lighter p-4" rows="4" cols="50" v-model="form.complete_description"></textarea>
		</div>	

		<div class="mb-2 w-3/4">
			<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Complete Background and Details
			</label>
			<VueTrix
			class="editor1" 
			inputId="editor1"
			@trix-attachment-remove="handleAttachmentRemove"
			@trix-attachment-add="handleAttachmentAdd"
			v-model="form.complete_description"
			/>
		</div>


		<div class="mb-2 w-3/4">
			<button type="submit" class="p-4 hover:bg-purple bg-blue w-3/4 font-bold text-white">Save Criminal</button>
		</div>
	</form>	

</div>
</template>
<script>
import urls from './scripts/endpoints.js';
import api from './scripts/api.js';
import Places from 'vue-places';
import VueTrix from "vue-trix";
import _ from "lodash"; 
export default { 
	components : { 
		'VueTrix' : VueTrix,
		'places' : Places, 
	},
	watch : { 
		question:function(newQuestion, oldQuestion){

		}
	},
	props :  {
		admins : { 
			type : Array,
			default : null
		},
		countries : { 
			type : Array,
			default : []
		},
		editor : {	
			type : Object,
			default : null
		}
	},
	data(){
		return { 
			image : "",
			form : {
				complete_description : null,
				alias : "",
				first_name : "",
				last_name : "",
				country: {
					label: null,
					data: {},
				},
				maxFiles: 1,
				criminals_name : "",
				currency : 1,
				avatar : "",
				placeholder:  "Well..",
				status : 1 , 
				bounty : "",
				posted_by : api.user.id , 
			// contact_number : api.user.phone_number , 
			contact_number : "",
			attachments : [],
			country_id : 1, 
			uploadUrl: urls.urlSaveCriminal,
		},
		withFiles: { type: Boolean, default: true },
		input_id: { // Id of upload control
			type: String,
			required: false,
			default: "default"
		},
		mainPhotoUrl: { // upload url
			type: String,
			required: true,
			default: null
		},	
		morePhotosUrl: { // upload url
			type: String,
			required: true,
			default: null
		},
		button_html: { // text/html for button
			type: String,
			required: true,
			text: 'Upload Images or Drag your photos here'
		},
		button_class: { // classes for button
			type: String,
			required: false,
			default: 'bg-blue'
		},
		localStorage : false , 
	}
},
computed : {
	endpoint(){
		return urls.urlSaveCriminal   ;
	},
	
	storePhotosUrl(){
		return urls.urlSavePhotos   ;
	},
	
	removePhotosUrl(){
		return urls.urlRemovePhotosUrl   ;
	},
	
	loggedOnUsersName(){
		return api.user.display_name ; 
	},
	
	last_seen(){
		return this.form.country.label;
	},

	send_attachment_endpoint(){
		return urls.url_for_saving_photos;
	},

	remove_attachment_endpoint(){
		return urls.url_for_removing_photos;
	}
},

methods : { 
	
	handleFile(file){
		if (!this.withFiles) {
			e.preventDefault();
		}
	},

	handleAttachmentAdd(event){
		var attachment = event.attachment;	
		if (attachment.file){
			var xhr = new XMLHttpRequest;
			xhr.open("POST", this.send_attachment_endpoint, true);
			xhr.setRequestHeader("X-CSRF-Token", window.App.csrfToken);
			xhr.upload.onprogress = function(event) {
				var progress = event.loaded / event.total * 100;
				attachment.setUploadProgress(progress);
			};

			xhr.onload = function() {
				if (xhr.status === 201) {
					var data = JSON.parse(xhr.responseText);
					console.log("Data"+data);
					return attachment.setAttributes({
						url: data.url, 
						href: 	data.url 
					})
					
				/*	setTimeout(function() {
						var url = xhr.responseText;
						return attachment.setAttributes({ url: url, href: url });
					}, 30)*/
				}
			};
			
			attachment.setUploadProgress(10);
			setTimeout(function() {
				xhr.send(attachment.file);
			}, 30)
		} else { 
			return response("no file");
		}
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

	handleAttachmentRemove(file){
		console.log("Trying to delete");
		console.log(file);
		/*axios.delete(this.remove_attachment_endpoint,{ 
			url : 
		})
		.then(response => {
			console.log(response);
		}).catch(error => {
			console.log(error);
		})*/
	},

	onAvatarChange(e){
		let files = e.target.files || e.dataTransfer.files;
		if (!files.length)
			return;
		this.createImage(files[0]);
	},

	createImage(file) {
		let reader = new FileReader();
		let vm = this;
		reader.onload = (e) => {
			vm.form.avatar = e.target.result;
		};
		reader.readAsDataURL(file);
	},

	showMap(){
		this.$modal.show("show-map");
	},

	accept_file(val){
		console.log(val);
	},
	show_criminals_information(){},

	registerCriminal(){
		// console.log(this.endpoint);	
		axios.post(this.endpoint,{
			form : this.form 
		}).then(response => {
			// console.log(response.status);
			console.log(response.status);
		}).catch(error => {
			alert(error.response.data.message);
			// console.log(error);
			if ( error.statusCode == 406){
				// alert(error.message);
			}
		});

			// console.log("Pressed on the button");
	// this.$modal.show('show-information', {});

	/*this.$modal.confirm().then( res => {
		axios.post(this.endpoint,  this.form)
		.then(response => {
			console.log(response.status);
		}).catch(error => {
			console.log(error);
		});

	}).catch( rej => {
			// I click cancel button
		});*/

	},

	uploadFile(e){
		if (e.attachment.file) {
			let date = new Date()
			let day = date.toISOString().slice(0, 10)
			let name = date.getTime() + "-" + e.attachment.file.name
			let id = [auth.currentUser.uid, day, name].join("/")
			let upload = storage.ref().child(id).put(e.attachment.file)
			upload.on(firebase.storage.TaskEvent.STATE_CHANGED, snapshot => {
				e.attachment.setUploadProgress((snapshot.bytesTransferred / snapshot.totalBytes) * 100)
			})
			upload.then(ref => {
				ref.ref.getDownloadURL().then(url => {
					e.attachment.setAttributes({ url, id })
				})
			})
		}
	},
}

};	
</script>
<style>
.vue_component__upload--image{
	border-radius: 15px;
	@apply .bg-grey-lighter .w-auto;
}

.trix-content{
	height: 200px;
	overflow-y: auto;
}

/* .trix-toolbar .trix-button-group:not(:first-child) {
margin-left: -0.1vw;
}

.vue_component__upload--image	 {
border-radius: 15px;
@apply .bg-grey-lighter .w-auto;
}

trix-editor {
border: 1px solid #e8e8e8;
border-radius: 10.9px;
} */
</style>