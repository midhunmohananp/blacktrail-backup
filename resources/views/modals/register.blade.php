<register inline-template>
	<modal name="register">
		<form action="/register" @submit.prevent="handleRegister"class="bg-grey-lightest p-4">
			<div id="input-group">
				<label for="">Name</label>
				<input type="text">
			</div>
		</form>
	</modal>
</register>