<template>
	<div>
		<div v-if="user != null">
			<form class="bg-white m-auto h-full p-4 w-full" id="setup-billing-form" @submit.prevent="submitProfile()" method="POST">
				<div class="flex inline-block">
					<div id="input-group" class="w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Username
						</label>
						<input v-model="form.username" type="text" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Your Username" required>
					</div>
					<div id="input-group" class="ml-2 w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Email
						</label>
						<input type="text"  v-model="form.email" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="email" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
				</div>
				<div class="flex inline-block">
					<div id="input-group" class="w-2/5 mr-2">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Currently Used Password
						</label>
						<input type="password"  v-model="form.current_password" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="current_password" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
					<div id="input-group" class="w-2/5 mr-2">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">New Password
						</label>
						<input v-validate="'required'" name="password" ref="password" type="password" v-model="form.password" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="password"  autocomplete="name" placeholder="Password" required>
					</div>

					<div id="input-group" class="w-2/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Confirm Password
						</label>
						<input v-validate="'required|confirmed:password'" type="password" v-model="form.confirm_password" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="confirm_password" name="confirm_password" autocomplete="name" placeholder="5000" data-vv-as="password" required>
					</div>				
				</div>

				<div class="mb-4 w-full" v-show="errors.any() != false">
					<div class="flex inline-block">
						<div class="bg-red-light p-1 text-white font-sans" v-if="errors.any()">
							<div v-if="errors.has('password')">
								{{ errors.first('password') }}
							</div>
							<div v-if="errors.has('confirm_password')">
								{{ errors.first('confirm_password') }}
							</div>
						</div>
						<div class="text-green-dark font-sans" v-else>
							<p>Passwords Match</p>
						</div>
					</div>	
				</div>


				<div class="flex inline-block">
					<div id="input-group" class="w-4/5 mr-4">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Display Name
						</label>
						<input type="display_name" v-model="form.display_name" class="bg-grey-lighter w-full mb-2 p-2 leading-normal" id="display_name" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
					<div id="input-group" class="w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Phone Number
						</label>
						<input type="phone_number" v-model="form.phone_number" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="phone_number" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
					<div id="input-group" class="ml-2 w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Country
						</label>
						<select id="country" class="bg-grey-lighter w-full mb-2 p-2 leading-normal">
							<option v-for="country in countries" v-model="form.country_id" v-text="country.name"></option>
						</select>
					</div>
				</div>

				<div class="flex inline-block mt-4">
					<div id="input-group" class="w-1/2">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Upload a photo of yours : 
						</label>
						<div class="card-body">
							<div class="row">
								<div class="col-md-3" v-if="form.image">
									<img :src="form.image" class="img-responsive" height="70" width="90">
								</div>
								<div class="col-md-6">
									<input type="file" v-on:change="onImageChange" class="form-control">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="mt-4 flex inline-block">
					<div id="input-group" class="w-full">	
						<button @click="submitButton" class="bg-blue text-white p-4 w-full">Submit
						</button>
					</div>
				</div>
			</form>
		</div>
		<div v-else>
			<div class="bg-grey-lightest p-4 rounded-md">
				<p class="font-sans tracking-tight text-2xl bg-gray-900">No profile as of today
				</p>
			</div>
		</div>
	</div>
</template>
<script>
import UploadImage from 'vue-upload-image';
import urls from './scripts/endpoints.js';
export default {
	name: 'UpdateProfile',
	props : {
		user : { 
			type : Object, 
			required : null
		},
		country : { 
			type : Array, 
			required : null
		}
	},
	data () {
		return {
			maxFiles : 1,
			form : { 
				image: '',
				username : this.user.username, 
				email : this.user.email, 
				current_password : "",
				password : "", 
				confirm_password : "", 
				display_name : this.user.display_name,
				phone_number : this.user.phone_number,
				country_id : this.user.country_id,
				uploadUrl : urls.update_profiles_endpoint,
			},
			countries : this.country,
			rules: [
			{ message:'One lowercase letter required.', regex:/[a-z]+/ },
			{ message:"One uppercase letter required.",  regex:/[A-Z]+/ },
			{ message:"8 characters minimum.", regex:/.{8,}/ },
			{ message:"One number required.", regex:/[0-9]+/ }
			],
			password:'',
			checkPassword:'',
			passwordVisible:false,
			submitted:false
		}
	},
	methods : { 
		uploadImageSuccess: function(result){
			console.log(result);
		},
		onImageChange(e) {
			let files = e.target.files || e.dataTransfer.files;
			if (!files.length)
				return;
			this.createImage(files[0]);
		},
		createImage(file) {
			let reader = new FileReader();
			let vm = this;
			reader.onload = (e) => {
				vm.image = e.target.result;
			};
			reader.readAsDataURL(file);
		},
		uploadImage(){
			axios.post(this.endpoint,{ image: this.image})
			.then(response => {
				if (response.data.success) {
					alert(response.data.success);
				}
			}).catch(error => {
				console.log(error);
			});
		},
		uploadImageAttempt(res){
			console.log(res);
		},
		uploadImageSubmitted(res){
			console.log(res);
		},
		uploadImageRemoved(res){
			console.log(res)
		},
		validateBeforeSubmit() {
			this.$validator
			.validateAll()
			.then((response) => {
				axios.put(this.endpoint, {
					params : { form : this.form }
				}).then(response => { 
					console.log(response.data);
				}).catch(error => {
					console.log(error);
				})
			}).catch(function(e) {
				console.log("not matched");
			});
		},
		submitProfile(){
    /*		axios.put(this.endpoint, {
    			params : { form : this.form }
    		}).then(response => { 
    			console.log(response.data);
    		}).catch(error => {
    			console.log(error);
    		})*/
    		axios.put(this.endpoint, { 
    			params : { 
    				form : this.form , 
    				image : this.form.image
    			}	 
    		}).then(response => {
    			console.log(response.data);
    		}).catch(error => {
    			console.log(error);
    		});

    	},
    	resetPasswords () {
    		this.password = ''
    		this.checkPassword = ''
    		this.submitted = true
    		setTimeout(() => {
    			this.submitted = false
    		}, 2000)
    	},
    	togglePasswordVisibility () {
    		this.passwordVisible = !this.passwordVisible
    	}	
    },
    computed : { 
    	endpoint(){
    		return urls.update_profiles_endpoint;
    	}
    }
};
</script>
<style lang="css" scoped>
.vue_component__upload--image{
	border-radius: 15px;
	@apply .bg-grey-lighter .w-auto;
}
</style>