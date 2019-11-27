<template>
	<ul style="overflow-y: scroll; height:400px;" class="flex flex-col w-full list-reset select-none font-basic">
		<li v-for="contact in contacts" :key="contact.id" @click="selectContact(index,contact)" :class="{'selected'}" class="flex flex-no-wrap items-center text-blac kcursor-pointer p-3">
			<div class="flex justify-center items-center flex-no-shrink w-12 h-12 bg-grey rounded-full font-semibold text-xl text-white mr-3">
			</div>
			<div class="flex-1 min-w-0" >
				<div class="flex justify-between mb-1">
					<h2 class="font-semibold text-sm">
						<i class="fas fa-users fa-fw"></i>
						{{ contact.display_name }}
					</h2>
					<span class="text-sm">
						<i class="fas fa-check fa-fw"></i>
						10:00
					</span>
				</div>
				<div class="text-sm truncate">
					<span>
						They: https://www.youtube.com
					</span>
				</div>
			</div>
		</li>
	</ul>
</template>
<script>
export default {
	name: 'ContactList',
	props : {
		contacts : {
				type : Array , 
				default : []
		}
	},
	data () {
		return {
		
		}
	}
};
</script>

<style lang="css" scoped>
</style>