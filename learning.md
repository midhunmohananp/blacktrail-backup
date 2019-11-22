## we can use each for collections only..
```php
$faker = \Faker\Factory::create();
$crimes = CrimeCriminal::whereNull('crime_details')->get();
$crimes->each(function($item,$key){
// dd($item);
	$faker = \Faker\Factory::create();
	DB::table("crime_criminal")->where([
		['crime_id','=',$item->crime_id],
		['criminal_id','=',$item->criminal_id],
	])->updated(['crime_details'=> $faker->sentence(8,true)]);
});
```





### We could add states in a factory
```

```

Basic Slots for example : 

## App.vue file
<site-header>Blacktrail</site-header>

what is inside the site-header tag will be inserted into the <slot/>

## SiteHeader.vue
<template>	
	<div class="bg-blue p-2 w-full">
		<h3 class="font-bold text-3xl font-display text-center text-white ">
			<slot/>
		</h3>
	</div>
</template>	

Named Slots

# in the blade or in the main.vue file for example :  BlogArticle.vue

```
<blog-post :author="author">
<h2 slot="header">Blog post title</h2>
<p>Blog post content</p>
<p>More blog post content</p>
</blog-post>
```

in the BlogPost.vue file

```html
<section class="blog-post">
<header>
<slot name="header"></slot>
<p>Post by {{ author.name }}</p>
</header>

<main>
<slot></slot>
</main>
</section>
```

then the html would look like 

```html
	<section class="blog-post">
	<header>
	<h2>Blog post title</h2>
	<p>Post by Callum Macrae</p>
	</header>

	<main>
	<p>Blog post content</p>
	<p>More blog post content</p>
	</main>
	</section>
```


# Scoped Slots

> It’s possible to pass data back into our slot components so that we can access component data in the parent component’s markup. Let’s make a component that gets user information, but leaves the display of it to the parent element:


```js
Vue.component('user-data', {
	template: '<div class="user"><slot :user="user"></slot></div>',
	data: () => ({
		user: undefined,
	}),
	mounted() {
    // Set this.user...
}
}); 
```

Any properties passed to <slot> will be available on a variable defined in the slot-scope property. Let’s call this component and display the user information with our own HTML:

	```
	<div>
	<user-data slot-scope="user">
	<p v-if="user">User name: {{ user.name }}</p>
	</user-data>
</div>
```

This functionality combined with named slots can be useful for overriding the styling of an element. Let’s take a component that displays a list of blog post summaries:

<div>
	<div v-for="post in posts">
		<h1>{{ post.title }}</h1>
		<p>{{ post.summary }}</p>
	</div>
</div>

Pretty simple. It takes an array of posts as posts, and then outputs all the post titles and summaries. To use it, we can do this:


<blog-listing :posts="posts"></blog-listing>
Let’s create a version of this in which we can pass in our own HTML to display the post summary—maybe, for example, on one page we want to display images instead. We need to wrap the paragraph element for the summary in a named slot element, which we can then override if we choose to.
Our new component looks like this:
<div>
	<div v-for="post in posts">
		<h1>{{ post.title }}</h1>

		<slot name="summary" :post="post">
		<p>{{ post.summary }}</p>
		</slot>
		</div>
	</div>

Now, the original way we used the component still works fine, because the paragraph element is still available as a fallback if no slot element is provided, but if we choose to, we can override the post summary element.
Let’s override the summary to display an image instead of the post summary:

<blog-listing :posts="posts">
<img
slot="summary"
slot-scope="post"
:src="post.image"
:alt="post.summary">
</blog-listing>

Now the image element is used instead of the text element. We provided the post summary as the alternate text for the image, though; this is important so that users using assistive technology such as screen readers still know what the blog post is about.
Slot scope destructuring
As a neat shortcut, you can treat the slot-scope argument as if it were a function argument, so you can use destructuring.
Let’s rewrite the previous example to use destructuring:

<blog-listing :posts="posts">
	<img
	slot="summary"
	slot-scope="{ image, summary }"
	:src="image"
	:alt="summary">
</blog-listing>




Watcher 

While computed properties are more appropriate in most cases, there are times when a custom watcher is necessary. That’s why Vue provides a more generic way to react to data changes through the watch option. This is most useful when you want to perform asynchronous or expensive operations in response to changing data.

