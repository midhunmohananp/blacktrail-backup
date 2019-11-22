<script>
import urls from './scripts/endpoints.js';
import api from './scripts/api.js';
import VueTrix from "vue-trix";
import _ from "lodash";
import UploadImage from 'vue-upload-image';

export default { 
	components : { VueTrix, UploadImage }, 
	data(){
		return { 
			form : { 
				placeholder:  "Well..",
				alias : "",
				status : 1 , 
				bounty : "",
				last_seen : "",
				contact_person : api.user.id , 
				contact_number : api.user.phone_number , 
				criminals_name : "",

			mainPhoto: { // name to use for FormData
				type: String,
				required: true,
				default: 'images[]'
			},

			button_class: { // classes for button
				type: String,
				required: false,
				default: 'btn btn-primary'
			},

			morePhotos: { // name to use for FormData
				type: String,
				required: true,
				default: 'images[]'
			},

			contact_number : "",
			attachments : [],
			country_id : 4 , 
			body : "",

			max_files: { // total # of files allowed to be uploaded
				type: Number,
				required: true,
				default: 1
			},

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
			}
		},
	url: { // upload url
		type: String,
		required: true,
		default: "/api/v1/upload"
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
		return urls.storeCriminalUrl   ;
	},

	storePhotosUrl(){
		return urls.urlSavePhotos   ;
	},

	loggedOnUsersName(){
		return api.user.display_name ; 
	}
},



methods : { 
	showMap(){
		this.$modal.show("show-map");
	},

	accept_file(val){
		console.log(val);
	},
	
	show_criminals_information(){
	},
	
	register_criminal(){
		// this.$modal.show('show-information');

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

	handleAttachmentAdd(e){
		if (e.attachment.file) {
			let date = new Date();
			
			let day = date.toISOString().slice(0, 10)
			
			let name = date.getTime() + "-" + e.attachment.file.name
			
			let id = [auth.currentUser.uid, day, name].join("/")
			
			let upload = storage.ref().child(id).put(e.attachment.file)
			
			console.log(upload); 
			/*	upload.on(firebase.storage.TaskEvent.STATE_CHANGED, snapshot => {
					e.attachment.setUploadProgress((snapshot.bytesTransferred / snapshot.totalBytes) * 100)
				})
				upload.then(ref => {
					ref.ref.getDownloadURL().then(url => {
						e.attachment.setAttributes({ url, id })
					})
				})*/
			}

	// console.log(file);


	// axios.post("")

},
handleAttachmentRemove(file){
	this.form.attachments = null ;
},
}
};	
</script>
<style>
trix-toolbar .trix-button-group:not(:first-child) {
	margin-left: -0.1vw;
}

.vue_component__upload--image	 {
	border-radius: 15px;
	@apply .bg-grey-lighter .w-auto;
}

trix-editor {
	border: 1px solid #e8e8e8;
	border-radius: 10.9px;
}
</style>