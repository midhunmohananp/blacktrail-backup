<template>
	<section id="inbox" style="overflow-y:scroll;height:300px;">
		<ul class="flex flex-col w-full list-reset select-none">
			<!-- v-for="conversation in conversations" :class="{ 'bg-blue' : 'isActive' }"  -->
			<li v-for="conversation in conversations" class="bg-blue flex flex-no-wrap items-center text-black cursor-pointer p-3">
				<img class="flex justify-center items-center flex-no-shrink w-12 h-12 bg-grey rounded-full font-semibold text-xl text-white mr-3" :src="userAvatar" alt="">
				<div class="flex-1 min-w-0">
					<div class="flex justify-between mb-1">
						<h2 class="font-semibold text-sm">
							<i class="fas fa-users fa-fw"></i> {{  conversation.respondent }}
						</h2>
						<span class="text-sm">
							<i class="fas fa-check fa-fw"></i>
							10:00
						</span>
					</div>
					<div class="text-sm truncate">
						<span>
							Some latest messages from this conversation.
						</span>
					</div>
				</div>
			</li>

	<!-- 		<li @click="" v-for="conversation in conversations" :class="{'selected' : 'bg-blue' }" class="flex flex-no-wrap items-center bg-blue text-white cursor-pointer p-3">
				<img class="flex justify-center items-center flex-no-shrink w-12 h-12 bg-grey rounded-full font-semibold text-xl text-white mr-3" :src="userAvatar" alt="">
				<div class="flex-1 min-w-0">
					<div class="flex justify-between mb-1">
						<h5 class="font-basic text-sm">
							<i class="fas fa-users fa-fw"></i> {{ this.contact.display_name }}
						</h5>
						<span class="text-sm">
							<i class="fas fa-check fa-fw"></i>
							<!-- 10:00
							 {{ this.contact.id }}
						</span>
					</div>
					<div class="text-sm truncate">
						<span>
							Some latest messages from this conversation.
						</span>
					</div>
				</div>
			</li> 
		-->

		<!-- <messages-feed :contact="contact" :messages="messages"></messages-feed> -->
	</ul>
</section>
</template>
<script>
import MessagesFeed from './MessagesFeed.vue';
import urls from './scripts/endpoints.js';
import api from './scripts/api.js';
import MessageComposer from './MessageComposer.vue';
export default {
	name: 'MessageInbox',
	components : { MessagesFeed, MessageComposer },
	props : {
		contact : {
			type : Object, 
			default : null
		},
		messages : { 
			type : Array,	
			default : []
		},
	},
	data () {
		return {
			editorContent : "lorem ipsum",
			conversations:  [],
			contacts : [],
			isHiglighted : true, 
			isActive : false 
		}
	},

	computed : {
		send_message_endpoint(){
			return urls.send_messages_endpoint;
		},
		userAvatar(){
			return this.contact.avatar;
		},
		fetch_messages_endpoint(){
			return urls.fetch_messages_endpoint;
		}	
	},


	methods : {
		highlightFeed(){
			// this.axios()

		},

		sendMessage(e) {
			console.log("pressed enter");
			axios.post(this.send_message_endpoint)
			.then(response => {
				console.log(response);
			}).catch(error => {
				console.log(error);
			});
		},

		fetch_messages(){
			console.log("respondent_id"+this.contact.id);
			axios.get(this.fetch_messages_endpoint, {
				params :  {
					user_id : api.user.id,	
					respondent_id : this.contact.id
				}
			}).then(response => {
				this.conversations = response.data;
				// console.log(response.data);
			}).catch(error => {
				console.log(error);
			});
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
	},
	mounted(){
		this.fetch_messages(); 
	}
};
</script>
<style lang="scss" scoped>
</style>