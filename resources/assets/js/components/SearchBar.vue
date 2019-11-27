<template>
	<div class="flex flex-shrink justify-between self-start items-center w-full px-2 py-4">
		<div class="text-center px-2 mr-2">
			<a href="#" class="no-underline text-lg text-grey hover:text-grey-dark">
				<i class="fas fa-bars"></i>
			</a>
		</div>
		<input type="text" class="flex-auto appearance-none bg-grey-lighter text-sm rounded px-4 py-2" placeholder="Search">
	</div>
</template>

<script>
export default {
	name: 'SearchBar',
	data () {
		return {

		}
	}
};
</script>

<style lang="css" scoped>
</style>