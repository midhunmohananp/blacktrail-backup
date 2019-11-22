<script>
import urls from "./scripts/endpoints.js" ; 

export default {
	props : ['criminals'],
	name: 'ConvertCurrency',
	data () {
		return {
			form : {
				criminal_id : this.criminals,
				amount:"",
				fromCurrency:"",
				toCurrency:""
			}
		}
	},

	computed : { 
		endpoint(){
			return urls.convertCurrencyUrl	;
		}
	},

	methods : { 

		convertCurrency(){
			
			// console.log(this.endpoint);
			axios.put(this.endpoint, { form : this.form })
			.then(response => {
				console.log(response)
			}).catch(error => { 
				alert("We found some errors along the way"+error.response.status);
			})
		}

	}
};
</script>

<style lang="css" scoped>
</style>