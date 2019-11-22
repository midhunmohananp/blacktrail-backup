<template>
	<section id="user-navigation" class="flex mt-2">
		<!-- <div v-show="normal_user"> -->
			<div>
				<a :href="this.billing_endpoint" class="mr-2 font-bold tracking-wide underline text-blue">
					Setup Billing
				</a>
				<a href="/criminals" class="mr-2 font-bold tracking-wide underline text-blue">
					Browse Criminals
				</a>
				<a href="/rewards" class="mr-2 font-bold tracking-wide underline text-blue">
					Bounty / Rewards
				</a>
				<a href="/logout" class="mr-2 font-bold tracking-wide underline text-blue">
					Logout
				</a>
			</div>
</section>
</template>
<script>
export default {
props : ['user'],
data(){
	return {
		normal_user : false , 
		billing_endpoint : `/user/profiles/billing/`+this.user.id
	}
},

methods:  {

},
computed : {
	is_normal_user(){

	}

}
};
</script>
