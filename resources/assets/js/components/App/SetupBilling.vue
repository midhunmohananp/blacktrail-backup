<template>
	<div>
		<div v-if="setupBilling" >
			<form class="bg-white m-auto h-full p-4" id="setup-billing-form" action="this.endpoint" method="POST">
				<div class="flex inline-block">
					<div id="input-group" class="w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Paypal Email :
						</label>
						<input type="text" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
					<div id="input-group" class="ml-2 w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Paypal Email :	
						</label>
						<input type="text" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
				</div>
				<div class="flex inline-block">
					<div id="input-group" class="w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Paypal Email :
						</label>
						<input type="text" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
					<div id="input-group" class="ml-2 w-3/5">	
						<label for="name" class="block uppercase tracking-wide text-black-v2 text-xs font-bold mb-2">Paypal ID :
						</label>
						<input type="text" class="bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="5000" required>
					</div>
				</div>

				<div class="mt-4 flex inline-block">
					<div id="input-group" class="w-full">	
						<button class="bg-blue text-white p-4 w-full">Submit</button>
					</div>
				</div>
			</form>
		</div>

		<div v-else>
			<div class="bg-grey-lightest p-4 rounded-md">
				<p class="font-sans tracking-tight text-2xl bg-gray-900">Paypal is the payment option people can use for now. We'll add more payment feature in the future. Don't worry.
				</p>
			</div>
		</div>
	</div>
</template>

<script>
import endpoints from "../scripts/endpoints.js" ; 
export default {	
	name: 'SetupBilling',
	data () {
		return {
			setupBilling : false,
			endpoint : endpoints.convertCurrencyUrl
		}
	},
	mounted(){
		alert("You can only use paypal for this one.");
	}
};
</script>
<style lang="css" scoped>
</style>