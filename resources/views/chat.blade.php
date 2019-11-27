@extends('layouts.master')
@section('title', 'Report the Location to this criminal')
@section('content')
<chat-app :respondent="{{ $user[0]->respondent }}" :user="{{ auth()->user() }}"></chat-app>
@endsection