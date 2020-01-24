<script>
import CriminalProfile from './Criminals/CriminalProfile.vue';
export default {	
	props : ['criminals'],
	data(){
		return {
			// showDiv : true , 
			showChatBox : true , 
			criminalsList : [],
			criminal: this.criminals ,
			apiDomain : window.App.apiDomain
		}
	},
	methods : { 
		fetchCriminals(){

		}
		
	},
	components : { CriminalProfile },

	data(){	
		return { 
			criminal : this.criminals ,
			apiDomain : window.App.apiDomain ,
		}
	},

	computed : { 
		avatarPath(){
			return this.apiDomain + '/assets/images/' +this.criminal.photo ; 
		}
	},

	mounted() {

		// console.log(this.criminal);

		// axios.get("/criminals").then(response => this.criminals = response.data); 
		// console.log('Criminal list is now mounted');
	}
};
</script>
