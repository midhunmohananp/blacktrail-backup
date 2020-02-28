<!DOCTYPE html> 
<html lang="{{ app()->getLocale() }}"> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}"> {{-- <meta name="viewport"
	content="width=SITE_MIN_WIDTH, initial-scale=1, maximum-scale=1"> --}} {{--
	<meta name="csrf-token" content="{{ csrf_token() }}"> --}} 
	<title>{{ config('app.name', 'Laravel') }} - @yield('title')</title> 
	<link rel="icon" href="{{  asset('assets/images/group_avatar.jpg') }}" type="image/x-icon">
	<link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
	<link href="{{ asset('css/app.css')}}" rel="stylesheet" data-turbolinks-track="true"> 
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">   
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">   {{-- when
	using microsoft edge as a developer tools..--}} {{-- <script
	src="http://localhost:8098"></script> <script
	src="http://192.168.22.3:8098"></script> --}} 
	<script>  
		window.App = @include("partials.stubs.global-vars") 
	</script>      
	@yield('styles') 
</head>
<body class="bg-grey-lighter-2 tracking-normal font-basic"> 
	<div id="app">
		{{-- <conviction></conviction> --}}
		<div v-if="criminal.crimes.length === 0" class="flex inline-block w-full">
			<select v-model="inputs.crime_id" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal">
				<option v-for="crimes in crimes">{{ crimes.criminal_offense }} </option>
			</select>
			<div class="ml-4 w-3/5">      
				<input type="text" v-model="inputs.name" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Attribute Details" required>
			</div>
			<span class="mr-2">
				<i class="fas fa-minus-circle" @click="remove(k)" v-show="k || ( !k && inputs.length > 1)">
				</i>
			</span>
		</div>
		<div class="w-full inline-block" v-else>
			<div v-for="(ccrime,i) in criminal.crimes">
				<p>{{ crimes.criminal_offense }} </p>
				<div class="flex inline-block">
					<select v-model="criminal.crimes[i].criminal_offense" class="hover:bg-grey-lightest bg-grey-lighter w-1/3 mb-2 p-2 leading-normal">
						<option v-for="crime in crimes" :value="crime.criminal_offense">{{ crime.criminal_offense }} </option>
					</select>
					<div class="flex inline-block w-full">
						<div class="ml-4 w-full">     
							<input type="text" :value="ccrime.description" class="hover:bg-grey-lightest bg-grey-lighter w-full mb-2 p-2 leading-normal" id="pin" name="pin" autocomplete="name" placeholder="Crime Details" required>
						</div>
						<span class="mr-2">
							<i class="fas fa-minus-circle" @click="remove(k)" v-show="k || ( !k && inputs.length > 1)">
							</i>
						</span>
					</div>
				</div>
			</div>
		</div>




	</div>
	<script data-turbolinks-suppress-warning src="{{ mix('js/app.js') }}"></script>
	@yield("scripts")
</body>
</html> 






<div id="app">
	<h2>Convictions</h2>
	<div style="padding:14px;">
		<template v-if="input.convictions.length">
			<div v-for="(conviction,index) in input.convictions" :key="index">
				<select v-model="conviction.conviction_id">
					<option v-for="option in convictionTypes" :value="option.id" :key="option.id">{{ option.label }}</option>
				</select>
				<input type="text" v-model="conviction.comment"/>
				<button @click="$delete(input.convictions, index)">X</button>
			</div>
		</template>
		<template v-else>
			<p style="text-align:center;margin:14px;">There are no convictions to be disaplayed.</p>
		</template>
		<p style="text-align:center;margin:7px;">
			<button @click.prevent.stop="addConviction">Add Convition</button>
		</p>
	</div>  
</div>