<template>
	<div>
		<div v-if="user != null">
			<form class="bg-white m-auto h-full p-4" id="setup-billing-form" @submit.prevent="submitProfile" method="POST">
				<div class="flex inline-block">
					<div id="input-group" class="w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Username
						</label>
						<input  v-model="form.username" type="text" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Your Username" required>
					</div>
					<div id="input-group" class="ml-2 w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Email :	
						</label>
						<input type="text"  v-model="form.email" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
				</div>
				<div class="flex inline-block">
					<div id="input-group" class="w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Password
						</label>
						<input type="password" v-model="form.password" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
					<div id="input-group" class="ml-2 w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Display Name
						</label>
						<input type="text" v-model="form.display_name" class="bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
				</div>
				<div class="flex inline-block">
					<div id="input-group" class="w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Phone Number
						</label>
						<input type="text"  v-model="form.phone_number" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
					<div id="input-group" class="ml-2 w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Country
						</label>
						<select class="bg-grey-lighter w-full mb-2 p-2 leading-normal">
							<option v-for="country in countries" v-model="form.country_id" v-text="country.name"></option>
						</select>
					</div>
				</div>

				<div class="flex inline-block">
					<div id="input-group" class="w-full">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Upload a photo of yours : 
						</label>
						<upload-image :url="form.uploadUrl" :maxFiles="form.maxFiles"></upload-image>
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
			form : { 
				username : this.user.username, 
				email : this.user.email, 
				password : this.user.password, 
				display_name : this.user.display_name,
				phone_number : this.user.phone_number,
				country_id : this.user.country_id,
				maxFiles : 1,
				uploadUrl : urls.update_profiles_endpoint,
			},
			countries : this.country
		}
	},
	methods : { 
		submitProfile(){
			axios.put(this.endpoint, {
				params : { form : this.form }
			}).then(response => { 
				console.log(response.data);
			}).catch(error => {
				console.log(error);
			})
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