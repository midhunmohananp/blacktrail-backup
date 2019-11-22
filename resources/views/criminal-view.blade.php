<section id="criminal-view">
	<section class="md:w-1/2 mr-6 font-basic" id="criminal_page">
		{{  $display_name }}
		<div class="bg-white px-8 py-8 pt-4 shadow-md">
			<div class="text-center">
				<div id="avatar" class="inline-block mb-6 w-full" >
					<img :src="avatarPath" class="h-50 w-50 rounded-full border-orange border-2">
					<p class="font-bold mt-2 text-orange text-2xl">
						{{ criminals_bounty_and_currency }}
					</p>
					<p class="font-bold font-display mt-2 text-black text-3xl">
						{{ this.criminals.full_name }}
						<!-- John Doe -->
					</p>
					<!-- <crimes-list :criminals="crimes"></crimes-list> -->

					<div v-if="this.criminals.crimes.length > 0">
						<p class="mt-2 font-bold text-2xl">Notable Crimes:
						</p>
						<!-- @foreach ($criminal->crimes as $crime)  -->
						<!-- Crimes List -->

<!-- <div class="mt-2 text-lg font-normal" v-if="criminals.crimes.length > 0 " v-for="criminal in criminals.crimes">
<p class="font-bold text-md" v-text="">{{  criminal.criminal_offense }} - {{  criminal.pivot.crime_details }}</p>
</div>
-->

<div id="crimesList">
	<div class="mt-2 text-lg font-normal" v-if="criminals.crimes.length > 0 " v-for="criminal in criminals.crimes">
		<p class="font-bold text-md" v-text="">{{  criminal.criminal_offense }} - {{  criminal.pivot.crime_description }}</p>
	</div>
</div>

<!-- <crimes-list :crimes="crimes" :criminals="criminals"></crimes-list> -->

</div>

<div v-else class="font-bold text-3xl font-basic mt-2 text-black-v2">
	No Crimes were listed for this criminal yet.
</div>

<!-- soon use slots here named or scoped  -->

<div v-show="userRole === 1 || userRole === 2">
	<admin-buttons :id="criminalId" :criminals="criminals"></admin-buttons>
</div>

<div v-show="normalUser">
	<user-buttons :id="criminalId" :criminals="criminals"></user-buttons>
</div>
</div>
</div>
</div>

</section>
</section>