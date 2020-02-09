// this is used for adding or deleting entries into the db/..
export default { 
	data(){
		return { 
			items : [],
			countries : [],
			image : "",
			isLoading : null , 
			form : {
				criminals_name : "",
				complete_description : "",
				alias : "",
				first_name : "",
				middle_name : "",
				last_name : "",
				eye_color : "",
				contact_number : "", 
				birthplace : "",
				last_seen : "",
				country: {
					label: null,
					data: {},
				},
				maxFiles: 1,
				currency : 1,
				avatar : null,
				avatar_url: '',
				placeholder:  "Well..",
				status : 1 ,
				bounty : "",
				weight_in_kilos : "",
				height : "",
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
				localStorage : false,
				requesting: false,
				creating: false,
				resetting: false,
			}
		},	
		computed:  { 
		},
		methods : {
			registerCriminal(){
			// e.preventDefault();
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

		updateCriminal(){
			this.isLoading = true;
			this.form.last_seen = this.form.country.label;

			setTimeout(() => {
				this.isLoading = false;
				this.requesting = true;
				this.creating = true;
				this.resetting = false;

				axios.post(this.update_criminal_endpoint,{
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
		}
	}
}