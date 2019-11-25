import VueRouter from 'vue-router';		

import CriminalView from './components/CriminalView.vue';
// import GroupView from './components/GroupView.vue';

let routes = [ 
{ 		
	path : '/criminal/:criminalId',
	name : 'criminalView',
	component : CriminalView,	
},
];

export default new VueRouter({
	routes,
	linkActiveClass: 'is-active'
});

