<template>  
	<div v-show="messageAvailable" id="logoutSuccess" class="bg-green-theme p-4 w-full">
		<p class="text-white">{{  message }}</p>
	</div>
</template>
<script>
export default {
	props : ['message'],
	data(){
		return { 
			messageAvailable : true
		}
	},
	mounted(){
		this.hideAfterSeconds();
	},
	methods : {
		hideAfterSeconds(){
			
		}
	}
};
</script>