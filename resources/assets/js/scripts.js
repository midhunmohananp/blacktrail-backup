import $ from 'jquery'  ;
import swal from 'sweetalert2' ; 
// import 'jqueryrouter';

$(() => {
	console.log("$ starts here");


	// console.log("Jquery is ready");
	$('.dropdown-menu').hide();
	
	$('img#userAvatar').on('click',function(evt){
		// console.log(evt);
		$('.dropdown-menu').toggle();
	});	

});



