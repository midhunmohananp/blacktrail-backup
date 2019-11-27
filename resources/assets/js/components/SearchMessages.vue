<template>
	<div class="flex flex-shrink justify-between self-start items-center w-full px-2 py-4">
		<input v-model="searchBar" type="text" class="flex-auto appearance-none bg-grey-lighter text-sm rounded p-3" placeholder="Search">
	</div>
</template>
<script>
export default { 
	data(){
		return { 
			searchBar : ""
		}
	}
};
</script>
