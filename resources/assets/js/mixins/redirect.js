// import axios from "axios";
export default {
	data(){
		return { 
			items : []
		}
	},
	
	methods : {
		redirectAdmin(url){
			return window.location.href = url 
		},	
		usersRedirect(url){}
	}
}