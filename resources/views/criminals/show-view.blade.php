@component('criminal-view')
@verbatim
@slot('display_name')
<p class="font-basic tracking-normal text-2xl mb-4 mt-4 font-normal text-black mr-2">
	Criminal Profile of {{ $criminal_name }}
</p>	
@endslot
@slot('body')
{!! $activity->subject->favorited->body !!}
@endslot
@endverbatim
@endcomponent



