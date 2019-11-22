<script>
export default { 
	data(){
		return {
			form : { 
				username : "",
				login : ""
			}
		}
	},
	methods : {
		handleLogin(){
				axios.post(this.endpoint)
					 .then(() => {

					 }).catch(()=>{

					 })
		}

	},
	computed : {
		endpoint(){
			return 
		}
	}
};
</script>