/*this class will be responsible for
 sending messages to tht otheruser.. */


export class MessageSender { 	

	constructor(message, messages = []){
		this.message = message; 
	}


	sendMessage(message,url){

		axios.post("api/v1/message")
			 .then(response => { 
				console.log(response);
			}).catch(error => { 
				console.log(error);
			})

	}


	log() {
		this.tasks.forEach(task => console.log(task) )
	}

	notify(){

		axios.post("/skills",this.form)
		.then(response => {
			console.log(response);
		})
		.catch(error => { 
			console.log(error);
		})

	},


	// default parameters
	// old
	function applyDiscount(cost, discount) {
		discount = discount || .10

		return cost - (cost * discount)
	}

	alert(applyDiscount(100))

	// new
	function applyDiscount(cost, discount = .10) {
		return cost - (cost * discount)
	}

	alert(applyDiscount(100));


	/*template literals*/


	static register(...args) {

		return new User(..args);
	}


	changeEmail(newEmail){
		this.email = newEmail ;
	}

}

	

