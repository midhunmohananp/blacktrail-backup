@extends('layouts.app')

@section('title', 'Reviewing Vue.js')

@section('content')
<div class="p-10">
	<landing-page inline-template>
		<div class="p-4">
			<!-- v-once doesn't change  the syntax-->
			@verbatim
			<div id="templateSyntax" class="pt-2 mt-4 mb-2 ">
				<div class="vText">
					<input class="p-4" type="text" v-model="msg">
					<span>This will bind : {{  msg }}</span>
				</div>

				<div class="vOnce">
					<input class="p-4 mt-2" type="text" v-model="vOnceMsg">
					<span v-once>This will not: {{  msg }}</span>
				</div>		
			</div>
			<hr class="h-0.1 bg-black">

			<div id="templateSyntax" class="pt-2 mb-2 ">
				<h2 class="mb-2">Raw html</h2 >
				<div class="rawHtml">
					<p>This will not display as html : {{  rawHtml }}</p>
					<p>This will be rendered as html : </p><div v-html="rawHtml"></div>
				</div>		
			</div>

			<hr class="h-0.1 bg-black">

			<div id="attribute-binding" class="pt-2 mb-2 ">
				<h3 class="text-xl mb-2">Attribute Binding</h3>
				<p :class="{ 'textClass'  : buttonIsClicked }">This is a text</p>
				<button class="bg-blue p-2 text-white" @click="buttonIsClicked ^= true">I will change the text</button>
			</div>

			<hr class="h-0.1 bg-black">
			<hr class="h-0.1 bg-black">

			<div class="mt-4" id="computedProp">
				<h3>Computed Properties</h3>

				<p v-html="completeMessage"></p>
				<p v-text="reversedMessage"></p>
			</div>
			@endverbatim

		</div>
	</landing-page>
</div>
@endsection