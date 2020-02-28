// this is used for adding or deleting entries into the db/..

export default { 
	data(){
		return { 
			items : [],
			countries : []
		}
	},
	computed : { 
		submitProfile(){
			return ``;
		},
		updateProfile(){

		}

	},

	methods : {
		updateCriminal(){
			axios.put()
		},


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

		add(){
			
		},
		destroy(){

		},

		editInformation(){
			
		}

	}
}