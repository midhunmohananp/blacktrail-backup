<template>
	<div class="flex justify-between items-center w-full borderb border-grey-lighter">
	<div class="flex-auto cursor-pointer select-none py-2 px-6">
		<h2 class="font-sans font-semibold text-base -mb-1">
			{{ respondent.display_name }}
		</h2>
		<span class="text-green text-sm ">
			Active 
		</span>
	</div>
	<ul class="flex list-reset py-2 px-4">
		<li class="px-4">
			<a href="#" class="no-underline text-grey hover:text-grey-dark">
				<i class="fas fa-search"></i>
			</a>
		</li>
		<li class="px-4">
			<a href="#" class="no-underline text-grey hover:text-grey-dark">
				<i class="fas fa-ellipsis-v"></i>
			</a>
		</li>
	</ul>
</div>
</template>
<script>
	export default { 
		props : { 
			user  : {
				type : Object,
				required : true
			},
			respondent : {
				type : Object, 
				required : true
			}
		}
	};
</script>