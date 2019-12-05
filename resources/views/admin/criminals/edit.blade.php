@extends('layouts.master')	
@section('title', 'Edit criminal Profile')
@section('styles')
	@trixassets	
@endsection

@section('content')
 <edit-criminal inline-template :admins="{{ $admins }}" :countries="{{ $countries }}" :criminal="{{ $criminal }}">
 	@include("partials.forms._edit-criminals")
</edit-criminal>
@endsection