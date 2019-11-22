<template>
	<div class="chat-app">
		<Conversation :contact="selectedContact"/>
		<ContactsList :contacts="contacts"/>
	</div>
</template>

<script>
export default {
	data(){
		return { 
			selectedContact : null,
			messages : []
		}
	},

	mounted() {
		console.log('Component mounted.')
	},
	data(){
		return {
			messages : ""
		}
	}
};
</script>