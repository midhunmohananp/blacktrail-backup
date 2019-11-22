<login inline-template>
	<modal name="login">
		<form class="p-6 bg-grey-lighter" @submit.prevent="handleLogin">
			{{-- <div class="mb-6">
				<label for="name" class="block uppercase tracking-tight text-grey-darker text-xs font-bold mb-2">Username</label>
				<input type="text" class="w-full p-2 leading-normal" id="name" name="name" autocomplete="name" placeholder="John Doe" value="{{ old('username') }}" required v-model="form.username" @keydown="errors.name = false">
				<span v-if="errors.name" v-text="errors.name[0]" class="text-xs text-red"></span>
			</div> --}}
		</form>
	</modal>	
</login>
