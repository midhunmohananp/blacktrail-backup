<aside id="main-sidebar" class="bg-white border-t h-screen border-black-top w-1/5 tracking-wide font-basic text-md mr-4 shadow-lg">
	<ul class="list-reset px-4 py-4">
		@includeWhen(auth()->user()->isAdmin(), 'partials.sidebar.admin')
		@includeWhen(auth()->user()->isAdmin() == false, 'partials.sidebar.members')
	</ul>
</aside> 