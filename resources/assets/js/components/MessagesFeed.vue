<template>
	<div class="feed" ref="feed">
		<ul v-if="contact">
			<li v-for="message in messages" :class="`message${message.to == contact.id ? 'sent' :'received'}`" :key="message">
       <div class="text">
        {{ message.text }}
      </div>
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
  }, 
  methods : {
    scrollToBottom() {
      setTimeout(() => {
        this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
      }, 50);
    }
  },
  watch : { 
    contact(contact){
      this.scrollToBottom();
    },
    messages(messages){
      this.scrollToBottom();
    }
  }
};
</script>
<style lang="css" scoped>
</style>