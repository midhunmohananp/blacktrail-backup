@extends('layouts.master')

@section('title', 'Welcome to your Profile')
@section('content')

<user-profile :user="{{ $profileUser }}"></user-profile>

@endsection