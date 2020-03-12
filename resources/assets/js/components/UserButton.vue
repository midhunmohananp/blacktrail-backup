<template>
	<section>		
		<button class="w-full bg-green-theme p-3 text-white mt-4 ml-2 hover:bg-green-second" @click="redirectToProfile(criminalId)">View Full Profile
		</button>
		<a :href="this.chatUrl" class="w-full bg-green-initial p-3 text-white mt-4 ml-2 hover:bg-green-second" type="button" >Report Location / Open Chat
		</a>
		<button class="w-full bg-white p-3 text-black border-grey-darkest border-2 hover:text-white mt-4 ml-2 hover:bg-green-second" @click="activateOfferBountyModal(id)">Offer / Pledge Additional Bounty	
		</button>	
	<!-- 	<button v-show="this.userRole = true" class="w-full bg-red p-3 text-white border-none border-2 hover:text-white hover:border-grey-lightest mt-4 ml-2 hover:bg-green-second" @click="requestPolice">Request for Police Assistance
	</button> -->
	<chat-box :id="id" :criminalName="criminals"></chat-box>
	<offer-bounty :id="id" :criminals="criminals"></offer-bounty>
</section>
</template>
<script>
import user from './scripts/api.js';
import ChatBox from './modals/ChatBox.vue';
import OfferBounty from './modals/OfferBounty';
import redirect from '../mixins/redirect';
import api from './scripts/api.js';
export default {
	
	props : ['id','criminals'],
	
	name: 'UserButton',

	
	mixins : ['redirect'],
	
	components:  { ChatBox, OfferBounty },

	data () {
		return {
			criminal_id : this.id ,
			offerBounty : false , 
			criminalInfo : this.criminals ,
		}
	},

	methods : { 
		redirectToProfile(id){
			// console.log(this.criminal_id);
			window.location.href = window.App.apiDomain + "/criminals/" + this.criminal_id ;
		},

		reportCriminalLocation(){
			this.$modal.show("chat-box");
			console.log("opening chat..");
		},
		requestPolice(){
			console.log("Opening police assistance Modal..");
		},
		activateOfferBountyModal(criminal_id){
			console.log("Criminal Id " +"" +criminal_id);
			this.$modal.show("offer-bounty"); 
		}
	},

	computed : { 
		chatUrl(){
			return api.app + '/messages/t/3'; 
			// return '/respond/criminal/' + this.criminal_id;
		},
		userRole(){
			roleId = user.role_id === 3 ? true : false;
			return roleId ; 
		},
		criminalsName(){
			return this.criminals.first_name +" " +this.criminals.last_name ; 
		}
	}
};
</script>

<style lang="scss" scoped>
</style>