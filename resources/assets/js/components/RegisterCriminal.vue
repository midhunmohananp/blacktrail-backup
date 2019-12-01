<script>
import urls from './scripts/endpoints.js';
import api from './scripts/api.js';
import VueTrix from "vue-trix";
import _ from "lodash";
export default { 
	components : { VueTrix },
	data(){
		return { 
			form : {
				maxFiles: 1,
				complete_description : "",
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
			console.log(this.endpoint);
			axios.post(this.endpoint,this.form)
			.then(response => {
				console.log(response.status);
			}).catch(error => {
				console.log(error);
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
.vue_component__upload--image{
	border-radius: 15px;
	@apply .bg-grey-lighter .w-auto;
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