@extends('layouts.master')
@section('title', 'Add New Criminals Form')			

@section('styles')
{{-- @trixassets --}}
@endsection

@section('content')

<register-criminal :admins="{{ $admins }}" :countries="{{ $countries }}"></register-criminal>

@stop

