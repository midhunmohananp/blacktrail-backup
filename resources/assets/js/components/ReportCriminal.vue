<script>
// import VueTrix from "vue-trix";
import _ from "lodash";
export default {
	name: 'ReportCriminal',
	data(){
		return {
			form : { 
				reporters_name: "",
				contact_number : ""
			}
		}
	},
	// components: { VueTrix }, 
	methods : {
		showMap(){
			this.$modal.show("show-map");

		},
		reportCriminal(){
			this.$modal.show("report-criminal");
		}
	},
};
</script>

<style lang="scss" scoped>	
#trix-toolbar-1 .trix-button-group:not(:first-child) { margin-left: 0vw; }
</style>