import VueRouter from 'vue-router';		
import CriminalView from './components/CriminalView.vue';
// import GroupView from './components/GroupView.vue';
let routes = [ 
{ 		
	path : '/criminal/:criminalId',
	name : 'criminalView',
	component : CriminalView,	
	props : true 
},
/*{
	path : 'user/:userId', 
	name : 'chatView',
	component : ChatView, 
	props : true
}*/
];

export default new VueRouter({
	routes,
	linkActiveClass: 'is-active'
});

