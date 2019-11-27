<template>
	<div class="flex justify-between items-center w-full borderb border-grey-lighter">
		<div class="flex-auto cursor-pointer select-none py-2 px-6">
			<h2 class="font-sans font-semibold text-base -mb-1">
				{{ respondent.display_name }}
			</h2>
			<span class="text-green font-semibold text-sm">
				<div class="flex mt-1 mr-2">
					<svg class="text-green-lighter fillCurrent h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/></svg>
					Active or Inactive
				</div>
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