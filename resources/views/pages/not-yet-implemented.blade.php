@extends('layouts.app')
@section('content')

<div class="flex items-center justify-center">
	<h3 class="tracking-normal text-grey-darker text-2xl font-semibold">This page wasn't yet implemented</h3>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>	
	

	$(function(){
		console.log(window.App.apiDomain);
		window.setTimeout(function () {
			location.href = window.App.apiDomain;
		}, 8000);
	});
</script>
@endsection