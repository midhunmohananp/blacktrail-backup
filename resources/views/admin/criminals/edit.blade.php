@extends('layouts.master')	
@section('title', 'Edit criminal Profile')
@section('styles')
@trixassets	
@endsection

@section('content')
{{-- <edit-criminal :admins="{{ $admins }}" :countries="{{ $countries }}" :criminal="{{ $criminal }}">
	
</edit-criminal>
--}}

@include("partials.forms._edit-criminals")

@endsection