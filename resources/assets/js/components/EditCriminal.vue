<template src="./templates/UpdateCriminal.html"></template>
<script>
import api from "./scripts/api.js";
import urls from "./scripts/endpoints.js";
import Places from 'vue-places';
import VueTrix from "vue-trix";
import datepicker from 'vue-date-picker';
import _ from "lodash"; 
export default {
	props : [ 'crimes', 'criminal', 'admins', 'countries'],
	components : { 
		'VueTrix' : VueTrix,
		'places' : Places, 
		'datepicker' : datepicker
	}, 
	data(){
		return {
			input: {
				crimes : [{ crime_offense_id: 2, description: "..."}]
			},
			country : this.criminal.country_id,	
			form : {
				avatar : api.publicPath + `\assets\images\avatar.jpg`,
				full_name : this.criminal.full_name ,
				eye_color : this.criminal.profile.eye_color,
				alias : this.criminal.alias,
				birthplace : this.criminal.profile.birthplace,
				birthdate : this.criminal.profile.birthdate,
				first_name : this.criminal.first_name,
				middle_name : this.criminal.middle_name,
				last_name : this.criminal.last_name,
				status : this.criminal.status, 
				complete_description : this.criminal.profile.complete_description,
				contact_number : this.criminal.contact_number,
				last_seen : this.criminal.profile.last_seen,
				height_in_cm : this.criminal.profile.height_in_feet_and_inches,
				contact_person : this.criminal.contact_person , 
				weight : this.criminal.profile.weight_in_kilos,
				maxFiles: 1,
				currency : 1,
				bounty : this.criminal.profile.bounty,
				// contact_number : api.user.phone_number , 
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
	},

	methods : {
		updateProfile(){
			this.isLoading = true;
			this.form.last_seen = this.form.country.label;

			setTimeout(() => {
				this.isLoading = false;
				this.requesting = true;
				this.creating = true;
				this.resetting = false;	

				axios.post(this.endpoint,{
					form : this.form
				}).then(response => {
					if ( response.status === 200){
						alert("Successfully Registered This Criminal");
						this.resetForm();
					}
					else {
						alert("We encounter some errors while adding that criminal");
					}
				}).catch((error) => {
					console.error((error));
					alert("We encounter some errors while adding that criminal, try to check your inputs");
				});

				this.requesting = false;
				this.creating = false;
			}, 1000);
		},

		updateUserRoute(){
			return `/`;
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
			vm.form.avatar = file;
			reader.onload = (e) => {
				vm.form.avatar = e.target.result;
			};
			reader.readAsDataURL(file);
		},
		isEmpty(obj) {
			return !obj || Object.keys(obj).length === 0;
		},

		addNewCrime(index) {
			this.input.crimes.push({ criminal_offense_id: 1, criminal_offense_description : "" });
		},

		removeCrime(input,index) {
			this.input.crimes.splice(input, index);
		},

	/*	 	
	this.inputs.push({
	criminal_offense_id: Math.random().toFixed(2),
	criminal_offense_description: this.form.complete_description
})*/
		// this.inputs.push({ criminal_offense_id: 1, criminal_offense_description : "" });

		updateCriminal(){


			this.isLoading = true;
			this.form.last_seen = this.form.country.label;
			setTimeout(() => {
				this.isLoading = false;
				this.requesting = true;
				this.creating = true;
				this.resetting = false;	

				axios.post(this.endpoint,{
					form : this.form
				}).then(response => {
					if ( response.status === 200){
						alert("Successfully Registered This Criminal");
						this.resetForm();
					}
					else {
						alert("We encounter some errors while adding that criminal");
					}
				}).catch((error) => {
					console.error((error));
					alert("We encounter some errors while adding that criminal, try to check your inputs");
				});
				this.requesting = false;
				this.creating = false;
			}, 1000);
		},

		getInputValue(obj, key) {
			const inputValue = document.getElementById(obj + "_" + key).value;
			if (inputValue.length > 0) {
				this.$set(this.form.obj, key, inputValue);
			} else {
				this.$delete(this.form.obj, key);
			}
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
computed : { 
	avatarImage(){
		return `public/assets/images/${this.criminal.photo}`;
	}

},
mounted(){
	this.addItem(); 
},
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

