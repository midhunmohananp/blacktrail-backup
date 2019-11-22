<template>
	<div id="composer" class="bg-white flex flex-wrap self-end items-center w-full text-xl">
		<div class="p-2">
			<a href="#" class="no-underline text-grey hover:text-grey-dark">
				<i class="fas fa-paperclip"></i>
			</a>
		</div>
		<input v-model="message" type="text" class="flex-auto appearance-none text-base p-2" placeholder="Write a message...">
		<div class="p-2">
			<a href="#" class="no-underline text-grey hover:text-grey-dark px-2">
				<i class="far fa-square"></i>
			</a>
			<a href="#" class="no-underline text-grey hover:text-grey-dark px-2">
				<i class="far fa-smile"></i>
			</a>
			<a href="#" class="no-underline text-grey hover:text-grey-dark px-2">
				<i class="fas fa-microphone"></i>
			</a>
		</div>
	</div>
</template>

<script>
export default {

	name: 'MessageComponent',

	data () {
		return {

		}
	},
	methods : { 
		send(){
			if ( this.message = "" ){
				return 
			}
			this.$emit('send',this.message);
			this.message = '';
		}
	}
};
</script>

<style lang="css" scoped>
</style>