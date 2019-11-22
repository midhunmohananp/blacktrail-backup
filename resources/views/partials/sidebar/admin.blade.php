<li id="sidebarNav" class="mt-2">
	<div class="flex"> 
		<svg class="ml-2 fill-current text-black h-8 w-8" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M16 9l-3-3V2h-2v2L8 1 0 9h2l1 5c0 .55.45 1 1 1h8c.55 0 1-.45 1-1l1-5h2zm-4 5H9v-4H7v4H4L2.81 7.69 8 2.5l5.19 5.19L12 14z"/>
		</svg>
		<a data-turbolinks="false" href="{{ route('admin.dashboard') }}" class="hover:text-red tracking-tight ml-2 mt-1">Home</a>
	</div>
</li>

<li id="sidebarNav" class="">
	<div class="flex"> 
		<svg class="ml-2 fill-current text-black h-8 w-8" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 14 16"><path fill-rule="evenodd" d="M3 10h4V9H3v1zm0-2h6V7H3v1zm0-2h8V5H3v1zm10 6H1V3h12v9zM1 2c-.55 0-1 .45-1 1v9c0 .55.45 1 1 1h12c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H1z"/></svg>

		<a href="{{ route('admin.criminals') }}" class="hover:text-red tracking-normal ml-2 mt-1">Criminals</a>
	</div>
</li>

<li id="sidebarNav" class="">
	<div class="flex"> 

		<svg class="ml-2 fill-current text-black h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 11.73a2 2 0 1 1 2 0V20H9v-8.27zm5.24 2.51l-1.41-1.41A3.99 3.99 0 0 0 10 6a4 4 0 0 0-2.83 6.83l-1.41 1.41a6 6 0 1 1 8.49 0zm2.83 2.83l-1.41-1.41a8 8 0 1 0-11.31 0l-1.42 1.41a10 10 0 1 1 14.14 0z"/></svg>
		<a href="{{ route('admin.statistics') }}" class="hover:text-red tracking-normal ml-2 mt-1">Statistics</a>
	</div>
</li>