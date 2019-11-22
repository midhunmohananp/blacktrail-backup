<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	{{-- <meta name="viewport" content="width=SITE_MIN_WIDTH, initial-scale=1, maximum-scale=1"> --}}
	{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
	<title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
</head>

<body class="bg-grey-lighter-2 tracking-normal font-basic">
	<div id="app" class="justify-content-center">
		<div id="paypal-button"></div>
	</div>
	<script src="{{ asset('js/app.js') }}" data-turbolinks-track="true"></script>
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script>
		paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
    	sandbox: 'ASKgsenjMcu30HAZQM_IRrlaEXjEkD5iJQaCO095cO8cL714mr6aIcIJO-TZ9xDgd-50ViBkfryO1-Jw',
    	production: 'EChS5F-mlAInglMh5m01TzQTnSnZW-KkVt9QMMwG2Mvu1nvOAr8ls331TPWU9-BpGHcBMuoHnIUJQ0LQ'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
    	size: 'large',
    	color: 'blue',
    	shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) { 
    	return actions.payment.create({
    		transactions: [{
    			amount: {
    				total: '0.01',
    				currency: 'USD'
    			}
    		}]
    	});

   /*   return actions.request.post("api/payment/create")
      .then(function(res){
        console.log(res);
        return res.id ; 
    });*/
},
    // Execute the payment
    onAuthorize: function(data, actions) {
    	return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
    });
    }
}, '#paypal-button');
</script>
</body>
</html> 