/**
* First we will load all of this project's JavaScript dependencies whi
* includes Vue and other libraries. It is a great starting point when
* building robust, powerful web applications using Vue and Laravel.
*/		
require('./bootstrap');

/*when using turbolinks in your app.
These don't mean that it would work since it means one thing these will not work w/ vue-router..
*/
// var Turbolinks = require('turbolinks');

// Turbolinks.start();

import router from './routes';
import PayPal from 'vue-paypal-checkout';
// import UploadImage from 'vue-upload-image';

window.Vue = require('vue');
window.$ = require('jquery');

Vue.component('chat-app', require('./components/ChatApp.vue'));
/*globally registered components.. */
Vue.component('app-header',require('./components/App/AppHeader.vue'));
Vue.component('app-sidebar',require('./components/App/Sidebar.vue'));
Vue.component('top-avatar',require('./components/App/TopAvatar.vue'));
Vue.component('criminals-view', require('./components/Criminals.vue'));
Vue.component('criminal-profile', require('./components/Criminals/CriminalProfile.vue'));
Vue.component("user-profile",require("./components/UserProfile.vue"));
Vue.component('groups-view', require('./components/Groups.vue'));
Vue.component('register', require('./components/Register.vue'));
Vue.component('login', require('./components/Login.vue'));
Vue.component('report-criminal', require('./components/ReportCriminal'));	
Vue.component('register-criminal', require('./components/RegisterCriminal'));	
Vue.component('criminal-map', require('./components/CriminalMap'));	
Vue.component('user-filters', require('./components/UserFilters.vue'));	
Vue.component('dashboard-nav', require('./components/DashboardNav.vue'));

Vue.component('criminal-layout',require('./components/CriminalViewLayout.vue')) ;
Vue.component("edit-criminal",require("./components/EditCriminal.vue"));
Vue.component("flash-message",require('./components/Alerts/FlashMessage.vue'));

/*the navigation under the Welcome to Blacktrail text*/
Vue.component("main-navigation",require('./components/MainNavigation.vue'));

//testing slots...
Vue.component('site-header',require('./components/Layouts/SiteHeader.vue'));
Vue.component('site-header-two',require('./components/Layouts/SiteHeader2.vue'));
Vue.component('convert-currency',require('./components/ConvertCurrency.vue'));
Vue.component('paypal-checkout', PayPal);	
Vue.component("setup-billing",require("./components/App/SetupBilling.vue"));

/*unnecessary components*/
Vue.component('user-profile', require('./components/UserProfile.vue'));
Vue.component('pending-users', require('./components/PendingUsers.vue'));
Vue.component('pending-users', require('./components/PendingUsers.vue'));
Vue.component('chat-label', require('./components/ChatLabel.vue'));
Vue.component('upload-image', require('./components/UploadImage.vue'));

// Vue.component('site-sidebar',require('./components/Layouts/SiteSidebar.vue'));

// other pages

// Globally registered filters..
/*
1. float the value of the amount bounty into two decimal places. 
*/

Vue.filter("format-bounty",function(value){
	return (value / 100 ).toFixed(2);
});

Vue.filter("format-currency",function(value){
	// return (val / 200 ).t
});	


const app = new Vue({
	el: '#app',
	data(){
		return {
			user_info: "",
		}
	},
	
	beforeRouteEnter (to, from, next) {
		getPost(to.params.id, (err, post) => {
			next(vm => vm.setData(err, post))
		})
	},

	beforeRouteUpdate(){

	},
	router
});

