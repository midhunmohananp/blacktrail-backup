<script>
export default {
	name: 'LandingPage',
	data () {
		return {
			msg : "message",
			vOnceMsg : "vOnce",
			rawHtml : "<h2 class='font-bold text-blue'>A blue text</h2>",
			dynamicId : '',
			buttonIsClicked : false ,
			// computed

			message1 : 'My Message is : ',
			message2: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, praesentium!"

		}
	},

	computed : { 
		completeMessage(){
			return '<h1 class="font-bold text-md text-red">'+this.message1 + this.message2 +'</h1>' ; 
		},
	},

	watch : {



	}
};
</script>

<style lang="scss" scoped>

.textClass {
	@apply .text-blue .font-bold .text-2xl
}




</style>