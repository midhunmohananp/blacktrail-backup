<template>
	<section class="md:w-1/2  ml-6 font-basic" id="criminal_Page">
		<h3 class="mt-8 mb-4">Profile Page of {{ user.display_name }}</h3>
		<div class="bg-white px-8 py-8 pt-4 shadow-md">
			<div class="text-center">
				<div id="avatar" class="inline-block mb-6 w-full" >
					<img :src="avatarPath" class="h-50 w-50 rounded-full border-orange border-2">
					<p class="font-bold font-display mt-2 text-black text-3xl tracking-tight">{{ user.display_name }}</p>
				</div>	
			</div>

			<section>	
				<div id="criminals-information" class="some-page-wrapper">
					<div class="row">
						<div class="ml-2 mr-1 column">
							Listed Name<p class="text-lg mb-2 font-bold">John Doe</p>
							Alias / aka<p class="text-lg mb-2 font-bold">	</p>
							First Name  <p class="text-lg mb-2 font-bold"> {{ $criminals.first_name }} </p>
							Middle Name  <p class="text-lg mb-2 font-bold">{{ $criminals.middle_name }} </p>
							Last Name <p class="text-lg mb-2 font-bold"> {{ $criminals.last_name }} </p>
						</div>
					</div>
					<button class="w-full bg-white p-3 text-black border-grey-darkest border-2 hover:text-white mt-4 ml-2 hover:bg-green-second" @click="activateOfferBountyModal(id)">Edit Profile
					</button>	
				</div>
			</section>
		</div>
	</div>
</section>
</template>
<script>
export default {
	props : ['user'],
	name: 'UserProfile',
	data () {
		return {
			items : []
		}
	},
	computed : {
		avatarPath(){
			return '/assets/images/default_avatar.jpg';
		},
	}
};
</script>

<style lang="css" scoped>
</style>