<p class="font-bold font-display">Thanks for signing up with Blacktrail</p>
<div class="font-basic text-md">
	<p>You can verify your email by clicking on the link below:</p>
	<p>
		{{-- {{  $user->confirmation_code }}  --}}
		<a href="">
			{{ action('VerificationController@confirmEmail',
				[
					'code' =>  $user->confirmation_code, 
					'email' => $user->email
				]
			) 
		}}
	</a>
</p>
</div>