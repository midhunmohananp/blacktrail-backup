<form id="setup-billing-form" action="{{ url('user/billing') }}" method="POST">
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