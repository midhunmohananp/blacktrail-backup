<template>
	<section class="blog-post">
		<header>
			<slot name="header"></slot>
			<p>Post by {{ profile.display_name }}</p>
		</header>

		<main>
			<slot></slot>
		</main>
	</section>
</template>

<script>
export default {

	name: 'SiteSidebar',

	props : ['profile'],

	data () {
		return {

		}
	}
};
</script>

<style lang="less" scoped>

</style>