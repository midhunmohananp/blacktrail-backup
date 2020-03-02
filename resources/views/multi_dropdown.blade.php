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
</head>
<body class="bg-grey-lighter-2 tracking-normal font-basic">
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
<script>
	new Vue({
		el: "#app",
		data: {
			input: {
				convictions: [
				{ conviction_id: 2, comment: 'First ever conviction.' }
				]
			}
		},
		methods: {
			addConviction: function(){
				this.input.convictions.push({ conviction_id: 1, comment: '' })
			}
		},
		computed: {
			convictionTypes() {
				return [
				{ id: 1, label: 'Conviction 1' },
				{ id: 2, label: 'Conviction 2' },
				{ id: 3, label: 'Conviction 3' }
				]
			}
		}
	})
</script>
</body>
</html> 





