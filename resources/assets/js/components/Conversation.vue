<template>
	<div class="content-start flex flex-col flex-wrap items-start w-2/3" style="
	/* height: 121%; */
	">
	<div class="flex justify-between items-center w-full border-b border-grey-lighter">
		<div class="flex-auto cursor-pointer select-none py-2 px-6">
			<h2 class="font-semibold text-base -mb-1">
				Youtubers Pro Gaming
			</h2>
			<span class="text-grey-dark text-sm">
				12 members
			</span>
		</div>
		<ul class="flex list-reset py-2 px-4">
			<li class="px-4">
				<a href="#" class="no-underline text-grey hover:text-grey-dark">
					<i class="fas fa-search"></i>
				</a>
			</li>
			<li class="px-4">
				<a href="#" class="no-underline text-grey hover:text-grey-dark">
					<i class="fas fa-ellipsis-v"></i>
				</a>
			</li>
		</ul>
	</div>
	<div class="flex flex-auto bg-no-repeat bg-center bg-cover overflow-y-auto" style="background-image: url(https://raw.githubusercontent.com/telegramdesktop/tdesktop/dev/Telegram/Resources/art/bg.jpg)">
		<div class="p-4">
			<div class="bg-green-lightest rounded-lg text-sm p-3 mb-1">
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam in, aliquid cum ut similique, reiciendis provident hic mollitia totam facere aspernatur numquam consequatur sunt. Facere aliquam sapiente fugit eveniet totam!
				</p>
			</div>
			<div class="bg-green-lightest rounded-lg text-sm p-3 mb-3">
				<p>
					Lalala...
				</p>
			</div>

			<div class="bg-white rounded-lg text-sm p-3 mb-1">
				<a href="https://www.youtube.com" class="no-underline hover:underline text-blue" target="_blank">
					https://www.youtube.com
				</a>
				<div class="flex items-center mt-2">
					<blockquote class="border-l-2 border-blue pl-2">
						<p class="font-medium text-blue">Youtube</p>
						<p>
							Enjoy the videos and music you love, upload original content, and share it all with friends, family, and the world on YouTube.
						</p>
					</blockquote>

					<a href="https://www.youtube.com" target="_blank" class="flex-auto">
						<img src="https://s.ytimg.com/yts/img/favicon_96-vflW9Ec0w.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="bg-white self-end items-center w-full text-xl">
		<!-- 	<input type="text" class="flex-auto appearance-none text-base p-2" placeholder="Write a message..."> -->
		<VueTrix class="appearance-none text-base p-2" @keypress.enter="sendMessage" v-model="editorContent" placeholder="Press shift + enter to send your message" localStoragem ipsum/>
		<!-- 
		<div class="flex-auto appearance-none text-base p-2">

		</div> -->
		<!-- <div class="p-2">
			<a href="#" class="no-underline text-grey hover:text-grey-dark px-2">
				<i class="far fa-square"></i>
			</a>
			<a href="#" class="no-underline text-grey hover:text-grey-dark px-2">
				<i class="far fa-smile"></i>
			</a>
			<a href="#" class="no-underline text-grey hover:text-grey-dark px-2">
				<i class="fas fa-microphone"></i>
			</a>
		</div>
	-->	
</div>
</div>
</template>
<script>
import MessagesFeed from './MessagesFeed.vue';
import MessageComposer from './MessageComposer.vue';
// import VueTrix from "vue-trix";
export default {
	name: 'Conversation',
	components : { MessagesFeed, MessageComposer },
	props : {
		contact : {
			type : Object, 
			default : null
		},
		messages : { 
			type : Array,
			default : []
		}
	},
	data () {
		return {
			editorContent : "lorem ipsum",
			conversations:  []
		}
	},
	methods : {
		sendMessage(e) {
			console.log("pressed enter");
			/*if (e.keyCode === 13 && !e.shiftKey) {
				e.preventDefault();
				this.submitForm();
			}*/
		},
		submitForm() {
			if (this.msg) {
				axios.post('conversation/send',{
					contact_id : this.contact.id
				}).then(response =>{
					console.log(response);
				}).catch(error => {
					console.log(error);
				});
				console.log('handle form submission')
	    }
	}
}
};
</script>
<style lang="scss" scoped>
</style>