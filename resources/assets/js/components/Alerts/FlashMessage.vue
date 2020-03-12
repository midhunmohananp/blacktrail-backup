<template>  
	<div v-show="messageIsAvailable" id="logoutSuccess" class="bg-green-theme p-4 w-full flex justify-between">
		<!-- <div class="flex inline-block">	 -->
			<p class="text-white font-semibold text-md font-sans">{{ message }}</p>
			<svg @click="messageIsAvailable = false" class="fill-current text-white h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>
			</svg>
	</div>
</template>
<script>
export default {
	props : ['message'],
	data(){
		return { 
			messageIsAvailable : true
		}	
	},
	methods : {
		hideAfterSeconds(){
			setTimeout(() => this.messageIsAvailable = false, 5000);
		}
	},
	mounted(){
		this.hideAfterSeconds();
	},
/*watch : { 
message(){

}
}*/
};
</script>