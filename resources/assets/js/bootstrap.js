window._ = require('lodash');
window.Pusher = require('pusher-js');

import axios from 'axios';
import Vue from 'vue' ;
import VueInputMultiple from 'vue-input-multiple';
import VueRouter from 'vue-router';
import moment from 'moment' ; 
import VModal from 'vue-js-modal'
import VeeValidate from 'vee-validate' ;
import VueSweetalert2 from 'vue-sweetalert2';
// import "vue-trix";
// import Vuetify from 'vuetify';
// import vuetifyCss from 'vuetify/dist/vuetify.min.css';

window.Vue = Vue ; 
window.axios = axios ;	
window.axios.defaults.headers.common = {
	'X-Requested-With': 'XMLHttpRequest'
};


Vue.use(VModal, { dialog: true })
Vue.use(VeeValidate);
Vue.use(VueRouter);
Vue.use(VueInputMultiple);
// Vue.use(VueTrix);

// Vue.use(InstantSearch);

const options = {
	confirmButtonColor: '#519E8A',
	cancelButtonColor: '#ff7674'
}

Vue.use(VueSweetalert2, options);

Vue.config.devtools = true ; 
Vue.config.performance  = true ; 
Vue.prototype.user = window.App.user;


import Echo from "laravel-echo" ;


window.Echo = new Echo({
	broadcaster: 'pusher',
	key : '1232b570ab3e5024b5e9d',
	cluster : 'ap1',
	encrypted : true
});


