<!-- the content files are in  -->
<script>
import api from "./scripts/api.js";
import urls from "./scripts/endpoints.js";
export default {
	props : ['criminal','admins','countries'],
	components : { 
		// UploadImage 
	}, 
	methods : {
		fetchCountries(){

		}
	},

	data(){
		return { 
			country : this.criminal.country_id,
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
			posted_by : this.criminal.posted_by,
			
			max_files: { // total # of files allowed to be uploaded
				type: Number,
				required: false,
				default: 10
			},


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
/*.vue_component__upload--image
.upload_image_form__thumbnails
.upload_image_form__thumbnail [&.bad-size, &.uploaded]
.img [&.show, &:hover]
span*/
</style>

