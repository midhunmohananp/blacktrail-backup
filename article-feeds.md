# I have an article feeds that are `router-links`
```js
<users-view inline-template :users="{{  $user }}">
	<article class="timeline-feeds">	
		<div class="flex" id="userProfile">	
			<router-link :to="{ name : 'userView', params : { userId : user.id , users : user }}" tag="a">
				<img class="h-18 w-18 rounded-full mr-4 mt-2" src="{{ asset('assets/images/'.$user->photo) }}" id="usersPhoto"  alt="users View" >
			</router-link>
			{{-- showing the names of the users --}}

			<div class="flex-1">
				@verbatim
				<h3 class="mt-4 font-basic">{{  user.full_name }}</h3>
				<p class="mt-2">aka <em class="font-basic roman">{{ user.alias  }}</em></p>
				@endverbatim
			</div>
		</div>
	</article>
</users-view>
```

and in my inline-template which is 
> UserView.vue

```html
<section class="md:w-1/2 mr-6 font-basic" id="user_Page">
		<p class="font-basic tracking-normal text-2xl mb-4 mt-4 font-normal text-black mr-2">
			user Profile of {{ users.full_name }} 
		</p>	
		<div class="bg-white px-8 py-8 pt-4 shadow-md">
			<div class="text-center">
				<div id="avatar" class="inline-block mb-6 w-full" >
					<img :src="avatarPath" class="h-50 w-50 rounded-full border-orange border-2">
					<p class="font-bold font-display mt-2 text-black text-3xl">{{ users.full_name }}</p>
					<p class="font-bold mt-2 text-orange text-2xl" v-text="userBounty === null ? 'No Bounty' : userBounty "></p>
					<!-- <articles-list :users="articles"></articles-list> -->

			<div v-if="this.users.articles.length > 0">
				<p class="mt-2 font-bold text-2xl">Notable articles:
				</p>
				<!-- @foreach ($user->articles as $article)  -->
				<!-- articles List -->

			<!-- <div class="mt-2 text-lg font-normal" v-if="users.articles.length > 0 " v-for="user in users.articles">
			<p class="font-bold text-md" v-text="">{{  user.user_offense }} - {{  user.pivot.article_details }}</p>
			</div>
			-->

			<div id="articlesList">
			<div class="mt-2 text-lg font-normal" v-if="users.articles.length > 0 " v-for="user in users.articles">
			<p class="font-bold text-md" v-text="">{{  user.user_offense }} - {{  user.pivot.article_description }}</p>
			</div>
			</div>

			<!-- <articles-list :articles="articles" :users="users"></articles-list> -->

			</div>

<div v-else class="font-bold text-3xl font-basic mt-2 text-black-v2">
	No articles were listed for this user yet.
</div>

<!-- soon use slots here named or scoped  -->

<div v-show="userRole === 1 || userRole === 2">
	<admin-buttons :id="userId" :users="users"></admin-buttons>
</div>

<div v-show="normalUser">
	<user-buttons :id="userId" :users="users"></user-buttons>
</div>

</div>
</div>
</div>
</section>
```

> take a look at `user-buttons` component


I only want to show the user-buttons if the current logged on user is a non admin type of user


So the UserButton.vue looks like this
```
<template>
	<section>		
		<button class="w-full bg-green-theme p-3 text-white mt-4 ml-2 hover:bg-green-second" @click="redirectToProfile(userId)">View Full Profile
		</button>
		<button class="w-full bg-green-initial p-3 text-white mt-4 ml-2 hover:bg-green-second" @click="reportuserLocation" >Report Location / Open Chat
		</button>
		<button class="w-full bg-white p-3 text-black border-grey-darkest border-2 hover:text-white mt-4 ml-2 hover:bg-green-second" @click="activateOfferBountyModal(id)">Offer / Pledge Additional Bounty	
		</button>	
	<!-- 	<button v-show="this.userRole = true" class="w-full bg-red p-3 text-white border-none border-2 hover:text-white hover:border-grey-lightest mt-4 ml-2 hover:bg-green-second" @click="requestPolice">Request for Police Assistance
	</button> -->

	<chat-box :id="id" :userName="users"></chat-box>
</section>
</template>

<script>
import user from './scripts/api.js';
import ChatBox from './modals/ChatBox.vue';
import redirect from '../mixins/redirect';
export default {
	props : ['id','users'],
	name: 'UserButton',
	mixins : ['redirect'],
	components:  { ChatBox, OfferBounty },
	data () {
		return {
			user_id : this.id ,
			offerBounty : false , 
			userInfo : this.users 
		}
	},

	methods : { 

		redirectToProfile(id){
			// console.log(this.user_id);
			window.location.href = window.App.apiDomain + "/users/" + this.user_id ;
		},
		reportuserLocation(){
			this.$modal.show("chat-box");
			console.log("opening chat..");
		},
		
		activateOfferBountyModal(user_id){
			console.log("user Id " +"" +user_id);
			this.$modal.show("offer-bounty"); 
		}
	},

	computed : { 
		userRole(){
			roleId = user.role_id === 3 ? true : false;
			return roleId ; 
		},
		usersName(){
			return this.users.first_name +" " +this.users.last_name ; 
		}
	}
};
</script>

<style lang="scss" scoped>
</style>
```
I want you guys to take a look at `ChatBox.vue`

```
<template>
<!-- 	<modal :resizable="true" name="chat-log" :scrollable="true" :adaptive="true" :maxHeight="100" :maxWidth="100">
		<div class="bg-black-v2 p-3">
			<p class="text-white font-basic text-2xl">Chat...</p>
		</div>
	</modal> -->
	<modal name="chat-box" :adaptive="true" width="80%" height="80%">
		<chat-label :respondent="this.respondents_name" :criminalName="this.criminal_name"></chat-label>
		<div class="quarter-screen overflow-hidden flex items-center justify-center">
			<div class="w-full">	
				<div class="bg-grey-lighter-2 shadow">
					<div class="flex h-full" style="max-height: 500px;">
						<div class="flex flex-wrap items-start content-start w-1/3 border-r border-grey-lighter h-full">
							<div class="flex flex-shrink justify-between self-start items-center w-full px-2 py-4">
								<div class="text-center px-2 mr-2">
									<a href="#" class="no-underline text-lg text-grey hover:text-grey-dark">
										<i class="fas fa-bars"></i>
									</a>
								</div>
								<input type="text" class="flex-auto appearance-none bg-white text-sm rounded px-4 py-2" placeholder="Search">
							</div>
							
							<ul class="flex flex-col w-full list-reset select-none">
								<li class="flex flex-no-wrap items-center bg-blue text-white cursor-pointer p-3">
									<div class="flex justify-center items-center flex-no-shrink w-12 h-12 bg-grey rounded-full font-semibold text-xl text-white mr-3">
										YP
									</div>
									<div class="flex-1 min-w-0">
										<div class="flex justify-between mb-1">
											<h2 class="font-semibold text-sm">
												<i class="fas fa-users fa-fw"></i> 

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
							</ul>
						</div>
						<div class="content-start flex flex-col flex-wrap items-start w-2/3" style="
						/* height: 121%; */
						">
						<div class="flex justify-between items-center w-full border-b border-grey-lighter">
							<div class="flex-auto cursor-pointer select-none py-2 px-6">
								<h2 class="font-semibold text-base -mb-1">
									Respondent's Name
								</h2>
								<span class="text-grey-dark text-sm">
									11 members
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
						<chat-composer></chat-composer>
					</div>
				</div>
			</div>
		</div>
	</div>
</modal>
</template>
<script>
import urls from '../scripts/endpoints.js';
import Contacts from '../Contacts.vue';
import ChatComposer from '../ChatComposer.vue';
export default {
	name: 'ChatBox',
	components : { ChatComposer },
	props : [ 'id' , 'criminalName' ],
	data () {
		return { 
			respondents_name :  "",
			criminal_name : this.criminalName, 
			resizable : true, 
			body : "",
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
			let criminal_id = this.id;
			console.log("Criminal ID"+criminal_id);
			axios.get(this.fetch_respondent_of_the_criminal_endpoint, {
				criminal_id : criminal_id
			}).then(response => {
				console.log("Respondent Name"+response.data.user[0].display_name);
				// this.respondents_name = response.data.name[0];
			}).catch(error => {
				console.log(error);
			});
		}
	},
	mounted(){
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
	
	.bg-sohbet:before {

		content: "";
		background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTAgOCkiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PGNpcmNsZSBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIgY3g9IjE3NiIgY3k9IjEyIiByPSI0Ii8+PHBhdGggZD0iTTIwLjUuNWwyMyAxMW0tMjkgODRsLTMuNzkgMTAuMzc3TTI3LjAzNyAxMzEuNGw1Ljg5OCAyLjIwMy0zLjQ2IDUuOTQ3IDYuMDcyIDIuMzkyLTMuOTMzIDUuNzU4bTEyOC43MzMgMzUuMzdsLjY5My05LjMxNiAxMC4yOTIuMDUyLjQxNi05LjIyMiA5LjI3NC4zMzJNLjUgNDguNXM2LjEzMSA2LjQxMyA2Ljg0NyAxNC44MDVjLjcxNSA4LjM5My0yLjUyIDE0LjgwNi0yLjUyIDE0LjgwNk0xMjQuNTU1IDkwcy03LjQ0NCAwLTEzLjY3IDYuMTkyYy02LjIyNyA2LjE5Mi00LjgzOCAxMi4wMTItNC44MzggMTIuMDEybTIuMjQgNjguNjI2cy00LjAyNi05LjAyNS0xOC4xNDUtOS4wMjUtMTguMTQ1IDUuNy0xOC4xNDUgNS43IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIi8+PHBhdGggZD0iTTg1LjcxNiAzNi4xNDZsNS4yNDMtOS41MjFoMTEuMDkzbDUuNDE2IDkuNTIxLTUuNDEgOS4xODVIOTAuOTUzbC01LjIzNy05LjE4NXptNjMuOTA5IDE1LjQ3OWgxMC43NXYxMC43NWgtMTAuNzV6IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIvPjxjaXJjbGUgZmlsbD0iIzAwMCIgY3g9IjcxLjUiIGN5PSI3LjUiIHI9IjEuNSIvPjxjaXJjbGUgZmlsbD0iIzAwMCIgY3g9IjE3MC41IiBjeT0iOTUuNSIgcj0iMS41Ii8+PGNpcmNsZSBmaWxsPSIjMDAwIiBjeD0iODEuNSIgY3k9IjEzNC41IiByPSIxLjUiLz48Y2lyY2xlIGZpbGw9IiMwMDAiIGN4PSIxMy41IiBjeT0iMjMuNSIgcj0iMS41Ii8+PHBhdGggZmlsbD0iIzAwMCIgZD0iTTkzIDcxaDN2M2gtM3ptMzMgODRoM3YzaC0zem0tODUgMThoM3YzaC0zeiIvPjxwYXRoIGQ9Ik0zOS4zODQgNTEuMTIybDUuNzU4LTQuNDU0IDYuNDUzIDQuMjA1LTIuMjk0IDcuMzYzaC03Ljc5bC0yLjEyNy03LjExNHpNMTMwLjE5NSA0LjAzbDEzLjgzIDUuMDYyLTEwLjA5IDcuMDQ4LTMuNzQtMTIuMTF6bS04MyA5NWwxNC44MyA1LjQyOS0xMC44MiA3LjU1Ny00LjAxLTEyLjk4N3pNNS4yMTMgMTYxLjQ5NWwxMS4zMjggMjAuODk3TDIuMjY1IDE4MGwyLjk0OC0xOC41MDV6IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIvPjxwYXRoIGQ9Ik0xNDkuMDUgMTI3LjQ2OHMtLjUxIDIuMTgzLjk5NSAzLjM2NmMxLjU2IDEuMjI2IDguNjQyLTEuODk1IDMuOTY3LTcuNzg1LTIuMzY3LTIuNDc3LTYuNS0zLjIyNi05LjMzIDAtNS4yMDggNS45MzYgMCAxNy41MSAxMS42MSAxMy43MyAxMi40NTgtNi4yNTcgNS42MzMtMjEuNjU2LTUuMDczLTIyLjY1NC02LjYwMi0uNjA2LTE0LjA0MyAxLjc1Ni0xNi4xNTcgMTAuMjY4LTEuNzE4IDYuOTIgMS41ODQgMTcuMzg3IDEyLjQ1IDIwLjQ3NiAxMC44NjYgMy4wOSAxOS4zMzEtNC4zMSAxOS4zMzEtNC4zMSIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utd2lkdGg9IjEuMjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIvPjwvZz48L3N2Zz4=');
		opacity: 0.06;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
		height:100%;
		position: absolute;   

	}

	.v--modal-overlay {
		background: rgba(255, 255, 255, 1);
	}
</style>
```



