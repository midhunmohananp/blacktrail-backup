<template>
	<section class="w-2/5 ml-2 font-basic" id="groupView">
		<p class="font-basic tracking-normal text-2xl mb-4 mt-4 font-normal text-black mr-2">Group Profile of </p>
		<div class="bg-white px-8 py-8 pt-4">
			<div class="text-center">
				<div id="avatar" class="inline-block mb-6" >
					<img class="h-50 w-50 rounded-full border-orange border-2">
					<p class="font-bold mt-2 text-blue">$15,000</p>
					<p class="mt-2 text-lg font-bold" >
						<!-- @foreach ($criminal->crimes as $crime)  -->
						<p class="mt-2 text-lg font-normal">
							<em class="font-bold roman">Offenses</em>Descr..
						</p>
						<!-- @endforeach -->
					</p>
					<div class="w-full flex justify-between">
						<button class="w-full bg-green-theme p-3 text-white mt-4 ml-2 hover:bg-green-second" href="/criminal/" >View Full Profile</button>
						<button class="w-full bg-green-initial p- 3 text-white mt-4 ml-2 hover:bg-green-second" @click="reportCriminalLocation" >Report Location</button>
						<button class="w-full bg-white p- 3 text-black border-black border-2 hover:text-white rounded-lg mt-4 ml-2 hover:bg-green-second" @click="this.$modal.show('offer-bounty')">Offer A Bounty
						</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
export default {
	props : ['groups'],

	name: 'GroupView',

	data () {
		return {
			group : this.groups
		}
	}
};
</script>

<style lang="scss" scoped>


</style>