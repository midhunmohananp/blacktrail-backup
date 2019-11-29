<template>
	<section class="md:w-1/2  ml-6 font-basic" id="criminal_Page">
		<h3 class="mt-8 mb-4">Profile Page of {{ user[0].display_name }}</h3>
		<div class="bg-white px-8 py-8 pt-4 shadow-md">
			<div class="text-center">
				<div id="avatar" class="inline-block mb-6 w-full" >
					<img :src="avatarPath" class="h-50 w-50 rounded-full border-orange border-2">
					<p class="font-bold font-sans mt-2 text-black text-3xl tracking-tight">{{ user[0].display_name }}</p>

					<button @click="editProfileButton" class="hover:bg-blue-darker hover:text-white bg-blue rounded-full w-1/2 mt-4 h-12 ">
						<a class="text-white hover:text-blue-lighter" :href="editProfileUrl">Edit Profile</a>
					</button>
				</div>	
			</div>

			<div class="init-row w-full">
				<div class="item w-1/2" id="basic-profile-section">
					<div class="row mb-3">
						<p class="text-md text-normal mr-4">Display Name: <em class="font-bold roman">{{ user[0].display_name }}</em></p>
					</div>	

					<div class="row mb-3">
						<p class="text-md text-normal mr-4">Email : <em class="font-bold roman">{{ user[0].email }}</em></p>
					</div>					
				</div>

				<div class="item" id="crimes-section">
					<div class="row mb-3">
						<p class="text-md text-normal mr-4">Username : <em class="font-bold roman" v-text="user[0].username"></em></p>
					</div>	

					<div class="row mb-3">
						<p class="text-md text-normal mr-4">Country : <em class="font-bold roman" v-text="user[0].country.name"></em></p>
					</div>	
				</div>

			</div>
		</div>
	</div>
	<edit-profile></edit-profile>
</section>
</template>
<script>
import urls from './scripts/endpoints.js';
import api from './scripts/api.js';
export default {
	props : ['user'],
	name: 'UserProfile',
	data () {
		return {
			items : []
		}
	},
	methods : { 
		editProfile(){
			this.$modal.show('user-modal', { authUser : this.user });
		}

	},
	computed : {
		editProfileUrl(){
			return urls.update_profiles_endpoint ; 
		},
		avatarPath(){
			return '/assets/images/default_avatar.jpg';
		}
	}
};
</script>

<style lang="css" scoped>
</style>