<template>
	<div class="inline-block flex">
		<div class="flex mt-4 ">
			<a href="/register" @click="createFreeAccount" class="mr-2 font-bold tracking-wide underline text-blue text-2xl">Create A Free Account
			</a>
			<a href="/login" @click="loginAccount" class="mr-2 font-bold tracking-wide underline text-blue-dark text-2xl">Login to your Account
			</a>
		</div>
	</div>
</template>
<script>
import Signup from './modals/Signup';
import Login from './modals/Login';

export default { 

	methods : { 
	
		createFreeAccount(){
			this.$modal.show('sign-up');
		},
		loginAccount(){
			this.$modal.show('login');
		}
	
	},
	data(){
		return { 
			items : ""
		}
	}	
};
</script>