<script>
export default {
	name: 'UserFilters',
	data () {
		return {	
			criminal :{ 
				sortBy: "",
				country: null,
				name : "",
				state: ""
			},
			group : { 
				name : "",
				country : "",
			}
		}
	},
	methods : { 

		changeFilterAdmin(event){
			var value = event.target.value;
			this.criminal.sortBy = value ;
			if (this.sortBy === 1){
				window.location.href = 'admin/criminals/followed';
			}
		},

		criminalSearch(){

		}


	}
};
</script>

<style lang="scss" scoped>
</style>