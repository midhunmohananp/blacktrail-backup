> I have an article feeds that are `router-links`, and I want to ask if How can I make it work everytime I change a route.

```
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

<router-view/>
```

# and in my `router-view` template which is UserView.vue
```
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
`take a look at `user-buttons` component`

### I only want to show the user-buttons if the current logged on user is a non admin type of user

So the UserButton.vue looks like this

# so everytime I change a route from the `article feeds`, I need to update the respondent's name in the `ChatBox.vue`
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

											Law Enforcement Name..
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
								Law Enforcement Name..
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
</style>
```