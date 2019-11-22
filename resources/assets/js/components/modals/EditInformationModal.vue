<template>
<!-- <transition enter-active-class="animated headShake"> -->
	<modal name="edit-info-modal">
		<form @submit.prevent="editInfo" class="bg-white p-2">
			<div class="form-group p-4 font-bold text-normal mr-2">
				<label for="first_name" class="mr-2 mb-4">First Name</label>
				<input type="text" value="User's First Name" name="first_name" class="w-1/2 p-2 bg-white border-grey-darker border-2">
			</div>
			<div class="form-group p-4 font-bold text-normal mr-2">
				<label for="first_name" class="mr-2 mb-4">First Name</label>
				<input type="text" name="first_name" class="w-1/2 p-2 bg-white border-grey-darker border-2">
			</div>
		</form>
	</modal>
	<!-- </transition> -->
</template>

<script>
export default {

	props : ['criminals'],

	name: 'EditInformationModal',

	data () {
		return {
			criminal : this.criminals
		}
	},

	created() {
		this.criminal = this.criminals ; 
	},
	computed :  {
		firstName (){
			return 	this.criminals.first_name 
		} 
	},
	methods : { 
		editInfo(){
			
		}

	}



}
</script>

<style lang="scss" scoped>
</style>