<template>
	<form>
		<template v-if="loading">
			Loading profile...
		</template>
		<template v-else-if="error != null">
			<h4>Sorry, THere was an error displaying this request.</h4>
			<p>{{ error }}</p>
			<a href="/">Go Back</a>
		</template>
		<template v-else>
			<label>Full Name</label>
			<input v-model="input.criminal.full_name" type="text">
			<input v-model="input.criminal.profile.eye_color" type="text">
			<button @click.prevent.stop="save" :disabled="saving">Update</button>
		</template>
	</form>
</template>
<script>
export default {
	name: 'criminal-profile',
	data: () => ({
		loading: true,
		error: null,
		input: {},
		saving: false
	}),

	mounted () {

		this.loading = true

		// GET JSON
		axios.get('/criminal/3/show').then(response => {
			this.input = response.data
			this.error = null
		}).catch(error => {
		this.error = error.message // Set error string...
	}).finally(() => {
		this.loading = false
	})
},
methods: {
	save () {
		this.saving = true
		axios.post('/criminal/3', this.input)
		.error(error => {
          console.log(error) // handle save error
      }).finally(() => {
      	this.saving = false
      })
  }
}
};
</script>