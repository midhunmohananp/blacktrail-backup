@extends('layouts.master')

@section('title', 'Admin Home')


@section('content')


<div class="px-8 mt-4">


{{-- If user is authenticated --}}

@auth


<h3 class="text-2xl mb-2 font-basic font-medium">Welcome to your dashboard, {{  $displayName }}</h3>

<div class="flex mt-2">
<a href="{{ route('admin.criminals.posted', $user_id) }}"  class="mr-2 font-bold tracking-wide underline text-blue">Browse My Posted Criminals</a>

<a href="{{ route('admin.pending.users', $user_id) }}"  class="mr-2 font-bold tracking-wide underline text-blue">View All Pending Members</a>

<a href="{{ route('admin.criminals') }}" class="mr-2 font-bold tracking-wide underline text-blue">Browse All Criminals</a>
<a href="{{ route('admin.criminals.new-form') }}" class="mr-2 font-bold tracking-wide underline text-blue">Add New Criminal</a>
<a href="/logout" class="mr-2 font-bold tracking-wide underline text-blue">Logout</a>
</div>



@endauth

{{-- If user isn't logged on. --}}


@guest

<div class="flex-1 font-basic mt-4 ">
<button class="bg-green-second rounded-lg shadow-md border-grey-darkest border-1 p-2 w-1/4 @click="this.$modal.show('register')"><a class="text-white text-large hover:text-black font-bold mr-2">Register</a></button>
<button class="bg-white rounded-lg shadow-md border-grey-darkest border-1  p-2 w-1/4"><a href="/login" class="text-black font-bold text-large hover:text-blue" @click="this.$modal.show("login")">Login</a href="/register"></button>
</div>


@endguest


<p class="mt-8 font-normal font-basic text-2xl">This portal helps law enforcement agencies & governments </p>

<ol class="mt-4">
    <li class="font-basic">Trace the criminals wherabouts </li>
    <li class="font-basic">Communicate with people in the neighborhood to create a criminal free environment</li>
</ol>

</div>

@endsection     