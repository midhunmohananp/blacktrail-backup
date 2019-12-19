@extends('layouts.master')
@section('title', 'Create New Campaign')
@section('styles')
<style>
	@trixassets
</style>
@endsection

@section('head-scripts')
<script>
	function login(){
		FB.login(function(response){
			console.log(response);
		}, { scope : 'public_profile'})
	}

	window.fbAsyncInit = function() {
		FB.init({
			appId  : "637464850090671",
			autoLogAppEvents : true,
			xfbml            : true,
			version          : 'v4.0'
		});
	};
</script>
<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
@endsection

@section('content')
<form action="{{ route('campaign.store') }}" class="bg-black p-4 w-1/2">
	<h5>New Campaign:</h5>

	@csrf
	
	<div class="form-group">
		<label for="exampleInputEmail1">Campaign Title : </label>
		<input type="text" class="form-control p-2" placeholder="Bloody Friday Sale">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Billing Account Name:  </label>
		<select v-model="form.billing_account_name" class="form-control" id="exampleFormControlSelect1">
			<option>Billing Account Name</option>
		</select>
	</div>
	<div class="form-group">
		@trix(\App\campaign::class, 'complete_description')
	</div>

	<div class="form-group p-2">
		<label for="exampleInputEmail1">Tags :(Press Enter each time)</label>
		<tags-input element-id="tags"
		v-model="selectedTags"
		:existing-tags="tags"
		:typeahead="true">
	</tags-input>
</div>

<div class="form-group">
	<label for="exampleInputPassword1">Password</label>
	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>

<div class="form-group form-check">
	<input type="checkbox" class="form-check-input" id="exampleCheck1">
	<label class="form-check-label" for="exampleCheck1">Remember my password</label>
</div>

<div class="form-group">
	<button type="submit" class="btn btn-block btn-primary">Submit</button>
</div>

</form>

@endsection