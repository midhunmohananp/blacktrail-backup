@extends('layouts.master')
@section('content') 
<chat-app :respondent="{{ $user[0]->respondent }}" :user="{{ auth()->user() }}"></chat-app>
@endsection