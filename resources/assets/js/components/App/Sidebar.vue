<template>
	<!--examples for slots.. 
	<a :href="route" @click.prevent="logout">
		<slot/>
	</a> -->

</template>

<script>
export default { 
	props: {
		route: {
			default: '/logout'
		}
	},

	/*data(){
		return { 
			app : window.App,
			roleId : window.App.user.role_id,
			appDomain : window.App
		}
	},	*/
};
</script>