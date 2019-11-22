<template>
	<!-- <VueTrix inputId="editor1" v-model="form.editorContent" placeholder="Please fill any details you know about the location / this criminal. "/> -->
	<div>
		<input id="trix" type="hidden" :name="name" :value="value">

		<trix-editor
		ref="trix"
		input="trix"
		@trix-change="change"
		:placeholder="placeholder">
		</trix-editor>
	
</div>


</template>

<script>

import Trix from "trix";

export default {
	name: 'Wysiwyg',

	props : ['name','value','placeholder'],

	data () {
		return {
			editorContent : "" 
		}
	} , 

	methods : { 
		updateEditorContent(value){

		},
		change({target}) {
			this.$emit('input', target.value)
		}
	},

	watch: {
		value(val) {
			if (val === '') {
				this.$refs.trix.value = '';
			}
		},
		editorContent: {
			handler: "updateEditorContent"
		}
	}
};
</script>

<style lang="css" scoped>
#trix-toolbar-1 .trix-button-group:not(:first-child) {
	margin-left: 0vw;
}
</style>