@extends('layouts.app')

@section('content')
<?php 
	$profile = "John Doe";
?>
<p class="text-2xl font-bold font-basic ml-2">Slots Crash Course</p>

<site-header>Blacktrail</site-header>

<site-header-two title="{{  $profile }}">
	<h2 slot="header">Blog Post Title</h2>
	<header>
	</header>
</site-header-two>

{{-- 
<site-sidebar :profile="{{  $profile }}">
	<h2 slot="header">Blog Post Title</h2>
	<p>Blog Post Content</p>
	<p>More Blog Posts</p>
</site-sidebar> --}}
@endsection