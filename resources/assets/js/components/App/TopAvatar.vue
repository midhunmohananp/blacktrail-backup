<template>
	<a href="/profile">
		<img class="topAvatar" :src="imagePath" alt="Your Avatar">
		<slot/>	
	</a>
</template>
<script>
export default {	
	props: {
		imagePath :  { 
			default : '/assets/images/avatar.jpg'
		}
	},
};
</script>

<style>
.topAvatar { 
	@apply .h-16 .w-16 .mt-4 .rounded-full .mb-2 .border-white .border-4;
}
</style>