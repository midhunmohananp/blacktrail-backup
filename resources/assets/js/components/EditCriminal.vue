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
			/*
			withoutPivot : this.criminal.crimes.map((crime, i) => { 
				const { ...copy, pivot } = crime; return copy; 
			}),	*/
			input: {	
				crimes : this.criminal.crimes 
			},

			send_attachment_endpoint : urls.url_for_saving_photos,
			isLoading : null ,
			datepickerClass : ['hover:bg-grey-lightest','bg-grey-lighter','w-full','mb-2','p-2',
			'leading-normal'], 
			country : this.criminal.country_id,	
			form : {		
				full_name : this.criminal.full_name ,
				alias : this.criminal.alias,
				first_name : this.criminal.first_name,
				posted_by : this.criminal.posted_by,
				middle_name : this.criminal.middle_name,
				birthplace : this.criminal.profile.birthplace,
				last_name : this.criminal.last_name,
				contact_number : this.criminal.contact_number,
				contact_person : this.criminal.contact_person , 
				status : this.criminal.status, 
				last_seen : this.criminal.profile.last_seen,
				birthdate : this.criminal.profile.birthdate,
				eye_color : this.criminal.profile.eye_color,
				weight : this.criminal.profile.weight_in_kilos,
				height : this.criminal.profile.height_in_feet_and_inches,
				country_of_origin : this.criminal.profile.country_of_origin,
				avatar : this.avatarEndpoint,
				complete_description : this.criminal.profile.complete_description,
				height_in_cm : this.criminal.profile.height_in_feet_and_inches,
				maxFiles: 1,
				currency : this.criminal.profile.currency,
				bounty : this.criminal.profile.bounty,
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
		}
	},	
	methods : {
		uploadAttachment(file,progressCallback,successCallback){
			if(!file){
				return;
			}

			const _this = this;
			console.log('uploading!');
			let formData = new FormData();
			formData.append('file', file);
			formData.append('attachable_type','App\CriminalInfo');
			formData.append('field','complete_description');
			axios.post(this.send_attachment_endpoint, formData, {
				headers: {
					'Content-Type': 'multipart/form-data',
				},
				onUploadProgress: (progressEvent) => {
					const totalLength = progressEvent.lengthComputable
					? progressEvent.total
					: progressEvent.target.getResponseHeader('content-length') ||
					progressEvent.target.getResponseHeader('x-decompressed-content-length');
					console.log('onUploadProgress', totalLength);
					if (totalLength !== null) {
						const progressData = Math.round((progressEvent.loaded * 100) / totalLength);
						progressCallback(progressData);
					}
				},
			}).then((response) => {
				progressCallback(100);
					// this bit is not axios way of doing it so I provided a value so it wont keep the loading bar
					let attachment = response.data;
					const attributes = {
						url: attachment.url,
						href: attachment.url +"?content-disposition=attachment"
					};
					successCallback(attributes);
				}).catch((error) => {
					console.log('FAILURE!!', error);
				});
				_this.requesting = false;
			},

			/*Updating a profile.*/
			updateProfile(){
				setTimeout(() => {
					this.isLoading = false;
					this.requesting = true;
					this.creating = true;
					this.resetting = false;	
					axios.put(this.endpoint, {
						id : this.criminal.id,
						form : this.form,
						input : this.input 
					}).then(response => {
						console.log(response);
					/*	if ( response.status === 200){
							alert("Successfully Registered This Criminal");
							this.resetForm();
						}
						else {
							alert("We encounter some errors while adding that criminal");
						}*/
					}).catch((error) => {
						console.log(error);
						// console.error((error));
						// alert("We encounter some errors while adding that criminal, try to check your inputs");
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


		/*	async setData(file) {
				const formData = new FormData();
				formData.append('type', file.type);
				formData.append('file', await this.fileToBlob(file.location)); // filereader image object which can be sent to the server
				formData.append('name', file.new_name);
				formData.append('url', file.location);

				return formData;
			},*/

			createImage(file) {
				let reader = new FileReader();				
				let vm = this;

				vm.form.avatar = file;
				
				reader.onload = (e) => {
					vm.form.avatar = e.target.result;
				};
				reader.readAsDataURL(file);
			},

			mountAvatar(e){
				let files = this.form.avatar;
				if (!files.length)
					return;
				this.createImage(files[0]);
			},


			isEmpty(obj) {
				return !obj || Object.keys(obj).length === 0;
			},

			addNewCrime() {
				this.input.crimes.push({ id: 1, description : "" });
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
			setTimeout(() => {
				this.isLoading = false;
				this.requesting = true;
				this.creating = true;
				this.resetting = false;	

				axios.post(this.endpoint,{
					form : this.form,
					crimes : this.input
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
			if(this.requesting || this.creating || this.resetting){
				event.preventDefault();
				return false;
			}

			const attachment = event.attachment;

			if(!attachment.file){
				return;
			}

			this.requesting = true;

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
	avatarEndpoint(){
		return api.publicPath.replace(/\\/g, "/");
	},

	endpoint(){
		return urls.urlUpdateCriminal +"/" +this.criminal.id; 
	},
	
	crimeTypes(){
		return this.crimes 
	}

},
mounted(){
	// this.mountAvatar(this.form.avatar) ;
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

