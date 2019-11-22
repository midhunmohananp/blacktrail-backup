<template>
	<div class="feed">
		<ul v-if="contact">
			<li v-for="message in messages" :class="`message${message.to == contact.id ? 'sent' :'received'}`" :key="message"></li>
			<li class="text">
				{{ message.text }}
			</li>
		</ul>
	</div>
</template>

<script>
export default {
  name: 'MessagesFeed',
  props : {
  	contact : {
  		type : Object, 
  	},
  	messages : {
  		type : Array, 
  		required : true
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