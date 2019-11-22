{{--  if user isn't logged on --}}
<app-sidebar inline-template>
	@include('partials.main-sidebar')
</app-sidebar>

{{-- When User is admin --}}

{{-- 	<li id="sidebarNav">
<div class="flex">
	<svg xmlns="http://www.w3.org/2000/svg" class="ml-2 fill-current text-black h-6 mt-2 w-6 "viewBox="0 0 20 20"><path d="M8 20H3V10H0L10 0l10 10h-3v10h-5v-6H8v6z"/>
	</svg>  --}}
	{{-- if user is logged on --}}
{{-- 	@if ( auth()->check() )

		@if( auth()->user()->role_id === 1 || auth()->user()->role_id === 2 )
		<a href="{{ route('admin.dashboard') }}" class="hover:text-red tracking-tight ml-2 mt-4">Home</a>
		@else
		<a href="{{ route('index') }}" class="hover:text-red tracking-tight ml-2 mt-1">Home</a>
		@endif

	@else

	<a href="{{ route('index') }}" class="hover:text-red tracking-tight ml-2 mt-1">Home</a>
	@endif			

</div>
</li>
--}}
