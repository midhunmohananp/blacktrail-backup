<template>
	<section class="w-full flex justify-between">
		<button @click="redirect_to_profile(id)" class="button w-full bg-green-theme p-3 text-white mt-4 ml-2 hover:bg-green-second">View Full Profile
		</button>
		<button class="w-full bg-green-initial p-3 text-white mt-4 ml-2 hover:bg-green-second" @click="edit_profile(id)">Edit Information
		</button>
		<button v-show="userHasCapabilityToViewChat" class="w-full bg-white p-3 text-black border-black border-2 hover:text-white rounded-lg mt-4 ml-2 hover:bg-green-second" @click="this.$modal.show('offer-bounty')">Chat / Report Log
		</button>		
		<edit-information-modal></edit-information-modal>
		<chat-box></chat-box>
	</section>
</template>

<script>
	import EditInformationModal from './modals/EditInformationModal.vue';
	import ChatBox from './modals/ChatBox.vue';
	export default {
		components : { EditInformationModal, ChatBox },
		props : ['criminals'],

		props : { 
			id  : {
				type : Number,
				required : true
			}
		},
		name: 'AdminButton',
		data () {
			return {
				userHasCapabilityToViewChat  : false, 
				criminalId : this.id
			}
		},
		computed : { 
			userHasCapabilityToViewChat(){
			}
		},

		methods : {

			check_if_the_currently_logged_on_user_posted_the_criminal(){

			},

			edit_profile(criminal_id){
				window.location.href = window.App.apiDomain + "/admin/criminals/" +this.id +"/edit"; 
			},

			editInformation(){
				this.$modal.show("edit-info-modal");
			// console.log("Editing info modal..");
			},

		redirect_to_profile(id){
			console.log(id);
			window.location.href = window.App.apiDomain + "/admin/criminals/"+id ; 
		}
	},

	computed : {
		criminalProfile(){
			return window.App.apiDomain + this.criminalId ; 
		}
	}
};
</script>

<style lang="scss" scoped>
</style>