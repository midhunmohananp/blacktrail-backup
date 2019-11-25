<template>
	<div class="bg-black-v2 p-4">
		<p class="text-white font-sans text-2xl">Private Chat with {{ respondent }}</p>
	</div>
</template>

<script>
export default {
	props : {
		respondent : {	
			type : String, 
			required : true ,
			default : "Jon Snow"
		},

		criminal_name : {	
			type : String, 
			required : false ,
			default : "Jon Snow"
		}
	}
};
</script>