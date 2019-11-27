<template>
	<modal name="chat-box" :height="full" :width="full" @closed="resetForm">
		<div class="bg-white p-4"></div>
		<!-- <div class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
			<div class="w-3/4">
				<div class="bg-white shadow">
					<div class="flex h-full" style="max-height: 600px">

						<div class="flex flex-wrap items-start content-start w-1/3 border-r border-grey-lighter h-full">
							<div class="flex flex-shrink justify-between self-start items-center w-full px-2 py-4">
								<div class="text-center px-2 mr-2">
									<a href="#" class="no-underline text-lg text-grey hover:text-grey-dark">
										<i class="fas fa-bars"></i>
									</a>
								</div>
								<input type="text" class="flex-auto appearance-none bg-grey-lighter text-sm rounded px-4 py-2" placeholder="Search">
							</div>

							<ul class="flex flex-col w-full list-reset select-none">
								<li class="flex flex-no-wrap items-center bg-blue text-white cursor-pointer p-3">
									<div class="flex justify-center items-center flex-no-shrink w-12 h-12 bg-grey rounded-full font-semibold text-xl text-white mr-3">
										YP
									</div>
									<div class="flex-1 min-w-0">
										<div class="flex justify-between mb-1">
											<h2 class="font-semibold text-sm">
												<i class="fas fa-users fa-fw"></i> Youtubers Pro Gaming
											</h2>
											<span class="text-sm">
												<i class="fas fa-check fa-fw"></i>
												10:00
											</span>
										</div>
										<div class="text-sm truncate">
											<span>
												They: https://www.youtube.com
											</span>
										</div>
									</div>
								</li>
								<li class="flex flex-no-wrap items-center hover:bg-grey-lighter text-black cursor-pointer p-3">
									<div class="flex justify-center items-center flex-no-shrink w-12 h-12 bg-grey rounded-full font-semibold text-xl text-white mr-3">
										GN
									</div>
									<div class="flex-1 min-w-0">
										<div class="flex justify-between mb-1">
											<h2 class="font-semibold text-sm">
												<i class="fas fa-users fa-fw"></i> Group name 2
											</h2>
											<span class="text-sm text-grey-dark">
												<i class="fas fa-check fa-fw text-green"></i>
												Tue
											</span>
										</div>
										<div class="text-sm text-grey-dark truncate">
											<span>
												<span class="text-blue">You:</span> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab quam perferendis nihil beatae, et accusamus voluptate quod sed necessitatibus ea provident! Ducimus consequuntur
												exercitationem cupiditate possimus consequatur sunt dignissimos voluptas?
											</span>
										</div>
									</div>
								</li>
								<li class="flex flex-no-wrap items-center hover:bg-grey-lighter text-black cursor-pointer p-3">
									<div class="flex justify-center items-center flex-no-shrink w-12 h-12 bg-grey rounded-full font-semibold text-xl text-white mr-3">
										CN
									</div>
									<div class="flex-1 min-w-0">
										<div class="flex justify-between mb-1">
											<h2 class="font-semibold text-sm">
												<i class="fas fa-bullhorn fa-fw"></i> Channel name
											</h2>
											<span class="text-sm text-grey-dark">
												Wed
											</span>
										</div>
										<div class="text-sm text-grey-dark truncate">
											<span>
												Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab quam perferendis nihil beatae, et accusamus voluptate quod sed necessitatibus ea provident! Ducimus consequuntur exercitationem cupiditate possimus consequatur sunt dignissimos voluptas?
											</span>
										</div>
									</div>
								</li>
								<li class="flex flex-no-wrap items-center hover:bg-grey-lighter text-black cursor-pointer p-3">
									<div class="flex-no-shrink w-12 h-12 bg-no-repeat bg-center bg-contain rounded-full mr-3" style="background-image: url(https://randomuser.me/api/portraits/women/33.jpg)"></div>
									<div class="flex-1 min-w-0">
										<div class="flex justify-between mb-1">
											<h2 class="font-semibold text-sm">
												Laurie Stewart
											</h2>
											<span class="text-sm text-grey-dark">
												<i class="fas fa-check text-green"></i>
												<i class="fas fa-check text-green -ml-3"></i>
												Tue
											</span>
										</div>
										<div class="text-sm text-grey-dark truncate">
											<span>
												<span class="text-blue">You:</span> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab quam perferendis nihil beatae, et accusamus voluptate quod sed necessitatibus ea provident! Ducimus consequuntur
												exercitationem cupiditate possimus consequatur sunt dignissimos voluptas?
											</span>
										</div>
									</div>
								</li>
								<li class="flex flex-no-wrap items-center hover:bg-grey-lighter text-black cursor-pointer p-3">
									<div class="flex-no-shrink w-12 h-12 bg-no-repeat bg-center bg-contain rounded-full mr-3" style="background-image: url(https://randomuser.me/api/portraits/women/35.jpg)"></div>
									<div class="flex-1 min-w-0">
										<div class="flex justify-between mb-1">
											<h2 class="font-semibold text-sm">
												Yuan Yaling
											</h2>
											<span class="text-sm text-grey-dark">
												18.04.18
											</span>
										</div>
										<div class="text-sm text-grey-dark truncate">
											<span>
												Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab quam perferendis nihil beatae, et accusamus voluptate quod sed necessitatibus ea provident! Ducimus consequuntur exercitationem cupiditate possimus consequatur sunt dignissimos voluptas?
											</span>
										</div>
									</div>
								</li>
								<li class="flex flex-no-wrap items-center hover:bg-grey-lighter text-black cursor-pointer p-3">
									<div class="flex-no-shrink w-12 h-12 bg-no-repeat bg-center bg-contain rounded-full mr-3" style="background-image: url(https://randomuser.me/api/portraits/men/46.jpg)"></div>
									<div class="flex-1 min-w-0">
										<div class="flex justify-between mb-1">
											<h2 class="font-semibold text-sm">
												Gregory Meyer
											</h2>
											<span class="text-sm text-grey-dark">
												16.04.18
											</span>
										</div>
										<div class="text-sm text-grey-dark truncate">
											<span>
												Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab quam perferendis nihil beatae, et accusamus voluptate quod sed necessitatibus ea provident! Ducimus consequuntur exercitationem cupiditate possimus consequatur sunt dignissimos voluptas?
											</span>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div class="content-start flex flex-col flex-wrap items-start w-2/3" style="
						/* height: 121%; */
						">
						<div class="flex justify-between items-center w-full borderb border-grey-lighter">
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
						<div class="bg-white flex flex-wrap self-end items-center w-full text-xl">
							<div class="p-2">
								<a href="#" class="no-underline text-grey hover:text-grey-dark">
									<i class="fas fa-paperclip"></i>
								</a>
							</div>
							<input type="text" class="flex-auto appearance-none text-base p-2" placeholder="Write a message...">
							<div class="p-2">
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
</modal>
</template>
<script>
import urls from '../scripts/endpoints.js';
import Contacts from '../Contacts.vue';
import ChatComposer from '../ChatComposer.vue';
import { Chat } from 'vue-quick-chat'
export default {
	name: 'ChatBox',
	components : { ChatComposer, Chat },
	props : ['id','criminalName'],
	data () {
		return { 
			respondents_name :  "Test..",
			criminal_name : this.criminalName, 
			resizable : true, 
			full : "100%",
			body : "",
			// criminal_id : this.id,
			participants: [
			{
				name: 'Arnaldo',
				id: 1
			},
			{
				name: 'José',
				id: 2
			}
			],
			myself: {
				name: 'Matheus S.',
				id: 3
			},
			messages: [
			{
				content: 'received messages', 
				myself: false,
				participantId: 1,
				timestamp: { year: 2019, month: 3, day: 5, hour: 20, minute: 10, second: 3, millisecond: 123 }
			},
			{
				content: 'sent messages', 
				myself: true,
				participantId: 3,
				timestamp: { year: 2019, month: 4, day: 5, hour: 19, minute: 10, second: 3, millisecond:123 }
			},
			{
				content: 'other received messages', 
				myself: false,
				participantId: 2,
				timestamp: { year: 2019, month: 5, day: 5, hour: 10, minute: 10, second: 3, millisecond: 123 }
			}
			],
			chatTitle: 'My chat title',
			placeholder: 'send your message',
			colors:{
				header:{
					bg: '#d30303',
					text: '#fff'
				},
				message:{
					myself: {
						bg: '#fff',
						text: '#bdb8b8'
					},
					others: {
						bg: '#fb4141',
						text: '#fff'
					}
				},
				submitIcon: '#b91010'
			},
			borderStyle: {
				topLeft: "10px",
				topRight: "10px",
				bottomLeft: "10px",
				bottomRight: "10px",
			},
			hideCloseButton: false,
			submitIconSize: "20px",
			closeButtonIconSize: "20px"
		}
	},
	computed : {
		fetch_respondent_of_the_criminal_endpoint(){
			return urls.fetch_criminals_respondent;
		},
	},
	methods : {
		beforeOpen(){
		// let displayName = event.params.display_name;
		},
fetch_respondent_of_the_criminal(){
	console.log("Criminal ID"+this.criminal_id);
	axios.get(this.fetch_respondent_of_the_criminal_endpoint, {
		criminal_id : this.criminal_id
	}).then(response => {
			// console.log("Response"+response.data);
			console.log("Respondent Name"+response.data.user[0].display_name);
			// this.respondents_name = response.data.name[0];
		}).catch(error => {
			console.log(error);
		});
	}
},
mounted(){
	// console.log(this.criminal_id);
	this.fetch_respondent_of_the_criminal(); 
}	
};
</script>
<style lang="css" scoped>
body{
	background: #ddd;
}

a {
	text-decoration: none !important;
}

label {

	color: rgba(120, 144, 156,1.0) !important;

}

.btn:focus, .btn:active:focus, .btn.active:focus {

	outline: none !important;
	box-shadow: 0 0px 0px rgba(120, 144, 156,1.0) inset, 0 0 0px rgba(120, 144, 156,0.8);
}


textarea:focus,
input[type="text"]:focus,
input[type="password"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="time"]:focus,
input[type="week"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="color"]:focus,
.uneditable-input:focus {   
	border-color: rgba(120, 144, 156,1.0); color: rgba(120, 144, 156,1.0); opacity: 0.9;
	box-shadow: 0 0px 0px rgba(120, 144, 156,1.0) inset, 0 0 10px rgba(120, 144, 156,0.3);
	outline: 0 none; }


	.card::-webkit-scrollbar {
		width: 1px;
	}

	::-webkit-scrollbar-thumb {
		border-radius: 9px;
		background: rgba(96, 125, 139,0.99);
	}

	.balon1, .balon2  {
		margin-top: 5px !important;
		margin-bottom: 5px !important;

	}
	.balon1 a {
		background: #42a5f5;
		color: #fff !important;
		border-radius: 20px 20px 3px 20px;
		display: block;
		max-width: 75%;
		padding: 7px 13px 7px 13px;
	}

	.balon1:before {

		content: attr(data-is);
		position: absolute;
		right: 15px;
		bottom: -0.8em;
		display: block;
		font-size: .750rem;
		color: rgba(84, 110, 122,1.0);
	}

	.balon2 a {

		background: #f1f1f1;
		color: #000 !important;
		border-radius: 20px 20px 20px 3px;
		display: block;
		max-width: 75%;
		padding: 7px 13px 7px 13px;

	}

	.balon2:before {

		content: attr(data-is);
		position: absolute;
		left: 13px;
		bottom: -0.8em;
		display: block;
		font-size: .750rem;
		color: rgba(84, 110, 122,1.0);

	}


	.v--modal-overlay {
		background: rgba(255, 255, 255, 1);
	}
	</style>