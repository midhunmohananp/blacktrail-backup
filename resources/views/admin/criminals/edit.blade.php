@extends('layouts.master')	
@section('title', 'Edit criminal Profile')
@section('styles')

@endsection

@section('content')

{{-- <edit-criminal> --}}
 	@include("partials.forms._edit-criminals")
{{-- </edit-criminal> --}}

@endsection