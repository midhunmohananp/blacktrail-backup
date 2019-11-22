 <template>
 	<div id="crimesList">
 		<div class="mt-2 text-lg font-normal" v-if="criminals.crimes.length > 0 " v-for="criminal in criminals.crimes">
 			<p class="font-bold text-md" v-text="">{{  criminal.criminal_offense }} - {{  criminal.pivot.crime_details }}</p>
 		</div>
 	</div>
 </template>

 <script>
 export default {

 	props : ['crimes','criminals'],

 	name: 'CrimesList',

 	data () {
 		return {
 			criminals : this.criminals
 		}
 	}
 };
 </script>

 <style lang="css" scoped>
 </style>