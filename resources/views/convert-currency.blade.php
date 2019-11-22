@extends('layouts.master')

@section('title', 'Convert currency')

@section('content')

<convert-currency inline-template :criminals="{{  $criminal }}">
	<form @submit.prevent="convertCurrency" method="POST" class="w-full max-w-md bg-white py-8 px-8 mt-8 ml-10">
		{{-- {{ csrf_field() }} --}}
		<div class="flex flex-wrap -mx-3 mb-6">
			
			<div class="md:w-full ml-2 mb-6">
				<h3 class="font-display font-sans">Currency Converter</h3>
			</div>

			<div class="w-full md:w-full px-3 mb-6 md:mb-0">
				<label class="block uppercase tracking-wide text-black text-xs font-bold mb-2" for="grid-first-name">
					Criminal ID: 
				</label>
				<input value="{{  $criminal }}" disabled v-model="form.criminal_id" readonly class="appearance-none block w-full bg-grey-lightest text-black border border-grey-dark rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Fill out the amount">
				{{-- <p class="text-red text-xs italic">Please fill out this field.</p> --}}
			</div>


			<div class="w-full md:w-full px-3 mb-6 md:mb-0">
				<label class="block uppercase tracking-wide text-black text-xs font-bold mb-2" for="grid-first-name">
					Amount
				</label>


				<input name="amount" v-model="form.amount" class="appearance-none block w-full bg-grey-lightest text-black border border-grey-dark rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Fill out the amount">
				{{-- <p class="text-red text-xs italic">Please fill out this field.</p> --}}
			</div>


			<div class="w-full md:w-full px-3 mb-8 md:mb-0">
				<label class="block uppercase tracking-wide text-black text-xs font-bold mb-2" for="grid-first-name">
					From Currency
				</label>

				<select name="form.from_currency" v-model="form.fromCurrency" class="appearance-none block w-full bg-grey-lightest text-black border border-grey-dark rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
					@foreach ($currencies as $currency)
					<option value="{{  $currency->currency_code }}">{{  $currency->currency_code }} - {{  $currency->currency }}</option>
					@endforeach
				</select>

				{{-- 	<input name="fromCurrency" class="appearance-none block w-full bg-grey-lightest text-grey-dark border border-grey-dark rounded-sm py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="GBP/USD"> --}}
				{{-- <p class="text-red text-xs italic">Please fill out this field.</p> --}}
			</div>
			<div class="w-full md:w-full px-3 mb-6 md:mb-0">
				<label class="block uppercase tracking-wide text-black text-xs font-bold mb-2" for="grid-first-name">
					To Currency
				</label>
				<select v-model="form.toCurrency" name="to_currency" class="appearance-none block w-full bg-grey-lightest text-black border border-grey-dark rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
					@foreach ($currencies as $currency)
					<option value="{{  $currency->currency_code }}">{{  $currency->currency_code }} - {{  $currency->currency }}</option>
					@endforeach
				</select>
				{{-- <p class="text-red text-xs italic">Please fill out this field.</p> --}}
			</div>

			<div class="w-full md:w-full px-3 mb-6 md:mb-0">
				<button type="submit" class="tracking-tight uppercase px-2 py-3 w-full bg-green-theme text-xl text-white font-display font-bold">Convert it now
				</button>
			</div>
		</div>
	</form>

</convert-currency>

@endsection