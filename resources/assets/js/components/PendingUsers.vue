<script>
import urls from "./scripts/endpoints.js" ; 
import Swal from 'sweetalert2';
export default {
	props : ['users'],
	name: 'PendingUsers',
	data () {
		return {
		// users : this.users
	}
},
computed : {
	activate_user_endpoint(){
		return urls.activateUserUrl;
	},
	delete_user_endpoint(){
		return urls.destroyUserUrl;
	}
},
methods : {
	delete_user(id){
		Swal({
			title: 'Are you sure?',
			text: 'This user will be deleted on site permanently',
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'No, keep it'
		}).then((result) => {
			if (result.value) {
				axios.delete(this.delete_user_endpoint,{
					params: {
						user_id : id
					}			
				}).then((response) => {
					console.log(response);
				}).catch((error ) =>{
					console.log(error);
				})

				
				Swal(
					'Deleted!',
					'This user was deleted successfully',
					'success'
					)
				location.reload();
// For more information about handling dismissals please visit
// https://sweetalert2.github.io/#handling-dismissals
} else if (result.dismiss === Swal.DismissReason.cancel) {
	Swal(
		'Cancelled',
		'You cancelled deleting this user',
		'error'
		)
}
});
},
	activate_user(id){
		Swal({
			title: 'Are you sure?',
			text: 'This user will be activated',
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, activate it',
			cancelButtonText: 'Do not continue'
		}).then((result) => {
			if (result.value) {
				axios.patch(this.activate_user_endpoint,{ 
					user_id : id
				}).then((response) => {
					console.log(response);
				}).catch((error ) =>{
					console.log(error);
				})
				Swal(
					'Activated!',
					'That user has been activated',
					'success'
					)
				location.reload(); 

// For more information about handling dismissals please visit
// https://sweetalert2.github.io/#handling-dismissals
} else if (result.dismiss === Swal.DismissReason.cancel) {
	Swal(
		'Cancelled',
		'You cancelled activating this user',
		'success'
		)
}
});





/*
		console.log(id);
		axios.post(this.delete_user_endpoint,{
			params: {
				id
			}			
		}).then((response)=>{
			console.log(response);
		}).catch((error)=>{
			console.log(error);
		})*/
	}
}
};
</script>
<style lang="css" scoped>
</style>