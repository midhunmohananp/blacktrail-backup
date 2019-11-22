@env('local')
<p>Local Environment</p>
@elseenv('testing')
	<p>Testing Environment</p>
@else
	<p>Production Environment</p>
@endenv
