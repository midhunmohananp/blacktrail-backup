<template>
	<div class="bg-blue p-2 w-full">
		<h3 class="font-bold text-3xl font-display text-center text-white ">
			<slot/>
		</h3>
	</div>
</template>	
<script>
export default {
	name: 'SiteHeader',
	data () {
		return {

		}
	}
};
</script>

<style lang="scss" scoped>

</style>