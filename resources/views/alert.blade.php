
<div class="alert alert-danger">
	{{  $slot }}
</div>

{{-- in the components.alerts file..  --}}

@component('alert')
    <strong>Whoops!</strong> Something went wrong!
@endcomponent

or


<!-- /resources/views/alert.blade.php -->



<div class="alert alert-danger">
    <div class="alert-title">{{ $title }}</div>

    {{ $slot }}
</div

{{-- components.alerts --}}
@component('alert')
    @slot('title')
        Forbidden
    @endslot

    You are not allowed to access this resource!
@endcomponent