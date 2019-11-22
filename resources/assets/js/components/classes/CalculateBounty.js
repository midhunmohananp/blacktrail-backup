export default class CalculateBounty { 
	constructor(bounty){
		this.bounty  = bounty ; 
	}

	addBounty(bounty){
		let initialBounty = this.bounty ; 
		let finalBounty = bounty + initialBounty ; 
	}


	log(bounty){
		console.log(bounty);
	}

}

