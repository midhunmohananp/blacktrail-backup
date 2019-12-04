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
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Old Password
						</label>
						<input type="password" v-model="form.current_password" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="current_password" name="pin" autocomplete="name" placeholder="5000">
					</div>
					<div id="input-group" class="w-2/5 mr-2">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">New Password
						</label>
						<input v-validate name="password" ref="password" type="password" v-model="form.password" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="password"  autocomplete="name" placeholder="Password">
					</div>

					<div id="input-group" class="w-2/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Confirm New Password
						</label>
						<input v-validate="'confirmed:password'" type="password" v-model="form.confirm_password" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="confirm_password" name="confirm_password" autocomplete="name" placeholder="5000" data-vv-as="password">
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
						<select v-model="form.country_id" id="country" class="bg-grey-lighter w-full mb-2 p-2 leading-normal" >
							<option :selected="user.country_id" :value="country.id" :key="country.id" v-for="country in countries">{{ country.name }}</option>
						</select>
					</div>
				</div>

				<div class="flex inline-block mt-4">
					<div id="input-group" class="w-1/2">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Upload a photo of yours : 
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

				<div class="mt-4 flex inline-block">
					<div id="input-group" class="w-full">	
						<button class="bg-blue text-white p-4 w-full">Submit</button>
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
			avatar: '',
			form : { 	
				country_id : this.user.country_id,
				username : this.user.username, 
				email : this.user.email, 
				id : this.user.id, 
				current_password : "",
				avatar : "",
				password : "", 
				confirm_password : "", 
				display_name : this.user.display_name,
				phone_number : this.user.phone_number,
				// uploadUrl : urls.update_profiles_endpoint,
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
		
		onAvatarChange(e) {
			let files = e.target.files || e.dataTransfer.files;
			if (!files.length)
				return;
			this.createAvatar(files[0]);
		},

		createAvatar(file) {
			let reader = new FileReader();
			let vm = this;
			reader.onload = (e) => {
				vm.form.avatar = e.target.result;
			};
			reader.readAsDataURL(file);
		},
		
		uploadImage(){
			axios.post(this.endpoint,{ avatar: this.avatar})
			.then(response => {
				if (response.data.success) {
					alert(response.data.success);
				}
			}).catch(error => {
				console.log(error);
			});
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
			// let data = new FormData();
			axios.put(this.endpoint, { 
				form : this.form , 
			}).then(response => {
				alert(response.data.success);
				// location.reload();
				let url = urls.show_profile_endpoint; 
				location.replace(url);
				console.log(url); 	
			}).catch(error => {
				alert(error.response.data.error);
			});
		},
		resetPasswords(){
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