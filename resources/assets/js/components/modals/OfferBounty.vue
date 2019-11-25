<template src="./OfferBounty.html"></template>
<script>
import 'trix';
import routes from '../scripts/endpoints.js';
import api from '../scripts/api.js';
import CalculateBounty  from '../classes/CalculateBounty';
import _ from 'lodash';
export default {	
	name: 'OfferBounty',
	props : ['id','criminals'],
	data(){
		return {
			textStatus : "Note : This software service uses USD for making payments just specify your currency, and we'll automatically convert your money",
			isTyping : false ,
			bounty_in_usd : 0.00,
			usedCurrency: this.criminals.profile.currency,
			isConverting : false , 
			api_results : [0,3,4,5],
			form: { 
				offer_bounty : 0.00,
				currencyCode : "USD", // user will choose between
				payment_option : 1,
				converted_money : 0,
				criminal_id : this.id, 
				toCurrencyCode : this.criminals.profile.currency   // USD 
			},
			my_items : [
			{
				"name": "hat",
				"description": "Brown hat.",
				"quantity": "1",
				"price": "5",
				"currency": "USD"
			},
			{
				"name": "handbag",
				"description": "Black handbag.",
				"quantity": "1",
				"price": "5",
				"currency": "USD"
			}
			],

			paypal: {
				sandbox: 'ASKgsenjMcu30HAZQM_IRrlaEXjEkD5iJQaCO095cO8cL714mr6aIcIJO-TZ9xDgd-50ViBkfryO1-Jw',
				production: 'ARVBy7D7n5t2sHfx56TXtszDOKWlsl9Rhww9tW7AFGCh--mJdOWr7-VFP1Qy9SSSNhqo7j5i4uWvHnZm'
			},

			environment : "sandbox",

			button_style : {
				label: 'checkout',
				size:  'large',    // small | medium | large | responsive
				shape: 'pill',         // pill | rect
				color: 'blue'         // gold | blue | silver | black
			},

			criminal_id : this.id,
			criminal_details : this.criminals , 
			currencies : [],

		}

	},

	created(){

	},	

	computed : {
		// returns what would be the value of the current money that will be converted...
		current_money(value){
			return (this.bounty_in_usd).toFixed(2);
		},

		current_bounty(){
		//  refers to the current bounty provided defaulted to 0.00	 
		// we need 2 call this request so that we can return the converted value to usd then we pass it to our 
		// 		this.convert_currency();

		// 		let convert_money = fx.convert(1000, {from: "USD" , to: "HKD"});

		// 		console.log(convert_money)


		// 		return parseFloat(this.form.offer_bounty).toFixed(2);		
	},

	fetch_currencies_endpoint(){
		return api.app + '/api/v1/currencies';
	},

	convert_to_usd_endpoint(){
		return api.app + '/api/v1/convert/currency/usd';
	},

	// 'localhost:3000/api/v1/update/bounty';
	update_the_bounty_of_the_user_endpoint(){
		return api.app + '/api/v1/update/bounty';
	},

	currentBounty(){
		let profile = this.criminals.profile; 
		return profile.bounty +" " + profile.currency ; 
	},




	updateBounty(){
		// convert the current money currency to usd
		this.convert_to_usd();

		// call the api and check if there is s

		axios.put(this.endpoint).then((response) => {
			console.log(response);
		}).catch((error) => {
			console.log(error);
		});
		/*	
		axios.post('/user', {
		firstName: 'Fred',
		lastName: 'Flintstone'
		})
		.then(function (response) {
		console.log(response);
		})
		.catch(function (error) {
		console.log(error);
		});
		*/

	}

},



methods : { 
	pay_authorized(payload){
		console.log("payment Authorized..");
		this.$emit("userAuthorized");
		console.log(payload);

	},
	
	add_up_the_value_to_the_bounty_of_the_criminal(amount_paid){
		
		
		axios.put(this.update_the_bounty_of_the_user_endpoint, {
			params : {
				total_amount: amount_paid,
				criminal_id : this.criminal_id ,
				used_currency : this.usedCurrency	
			}
		})
		.then(response => {
			console.log(response);
		}).catch(function (error) {
			console.log(error);
		});

	},

	pay_completed(payload){
		console.log("Payment is completed..");
		this.$emit("pay_completed");
		console.log(payload);

		if (payload.state =="approved"){
			let total_amount_paid_in_usd = payload.transactions[0].amount.total ;
			this.add_up_the_value_to_the_bounty_of_the_criminal(total_amount_paid_in_usd);
			Vue.swal("Payment was made in USD value of:"+total_amount_paid_in_usd);
			this.$modal.hide('offer-bounty');
		}
		else { 
			this.$modal.hide('offer-bounty');
			Vue.swal("We encounter some issues while trying to create that payment of yours..");
		}

	},
	pay_cancelled(payload){
		console.log("Payment is cancelled");
		this.$emit("pay_cancelled");
		console.log(payload);
	},
	attempt_to_convert: _.debounce(function () {
		this.textStatus = "Converting to USD...";
		// console.log(this.form.offer_bounty);
		if (this.form.offer_bounty != 0){
			axios.get(this.convert_to_usd_endpoint, {
				params: {
					offer_bounty : this.form.offer_bounty,
					from_currency_code : this.form.currencyCode,                       
					to_currency_code : this.form.toCurrencyCode,
					criminal_id : this.id
				}	
			}).then(response => {
				let bounty_value_in_usd = response.data.toFixed(2);
				this.bounty_in_usd = parseFloat(bounty_value_in_usd) ;
				
				if (this.form.currencyCode == "USD") {
					this.textStatus =  `...`;
				}
				else {
					this.textStatus =  `${this.form.offer_bounty} ${this.form.currencyCode} is equal to ${this.bounty_in_usd} USD`;
				}
				console.log(response);				
/*
				axios.get(this.fetch_currencies_endpoint)
	.then(response => this.currencies = response.data)
	.catch(error => console.log(error));*/
}).catch(function (error) {

	if (error.statusCode == 500){
		Vue.swal('We encounter some error trying to convert that currency, try a different currency');	
	}

});
/*when using sweetalert..*/
	// Vue.swal('Nice work mate..`');	

}
else {
	alert("Please specify a pledge greater than 0");
}



}, 1500),

	get_balance_of_an_account(){

	},

	returns_value_of_currency_to_usd: function(searchQuery) {
		this.isTyping = true;
		axios.get(this.convert_to_usd_endpoint)
		.then(response => {
			console.log(response);
			
		/*	this.isLoading = false;
		this.searchResult = response.data.items;*/
	});
	},

	/*only numbers and numbers with decimals can be supplied...*/
	isNumber: function(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
			evt.preventDefault();;
		} else {
			return true;
		}
	},


	convert_to_usd(){
		
	},

	notify_user(){
		alert("Sadly this payment feature hasn't been implemented yet, Try Paypal");
	},

	resetForm(){
		this.form = {
			offer_bounty : 0.00,
			currencyCode : 1,
			payment_option : 1,
			converted_money : 0,
			criminal_id : this.id, 
			toCurrencyCode : this.criminals.profile.currency   
		}
	},

	update_bounty(){	
	// using currency layer api.
	let updateBountyRoute = routes.add_bounty_url   ;

	axios.put(updateBountyRoute, { form : this.form   })
	.then(response => console.log(response))
	.catch(error => console.log(error))

},

fetch_currencies(){
	axios.get(this.fetch_currencies_endpoint)
	.then(response => this.currencies = response.data)
	.catch(error => console.log(error));
}

},

/*can be used to watch computed or data properties*/
watch : { 
	/*'form.offer_bounty'(val){	
		// do something after 2 seconds that the user stops typing in the offer_bounty field..
		_.debounce(function(val){
			console.log("doing something after 2 seconds");
		},2000);

	},*/


	isTyping: function(value) {
		if (!value) {
			this.searchUser(this.searchQuery);
		}
	},


	isConverting(val){
		if (!value) {
			console.log("No value");
		}
		else {
			console.log(val);
		}
	}
},

mounted(){
	this.fetch_currencies();
	
	// return fx(1000).from("USD").to("GBP");
	// this.fetch_users();


	/*
	// console.log(fx.convert(12.99, {from: "GBP", to: "HKD"}));
	this.$watch('form.total_price', function(){


	}, optionsObj)
	*/
	
}
};
</script>

<style lang="css" scoped>
#closeButton {
	float:right ;
}

.v--modal-overlay {
	background: rgba(255, 255, 255, 1);
}
</style>