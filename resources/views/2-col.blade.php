@extends('layouts.master')	

@section('content')
<div class='some-page-wrapper'>
	<div class='row'>
		<div class='column'>
			<div class='orange-column'>
				<h3>Edit Criminal Profie</h3>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='column'>
			<div class='green-column'>
				Some Text in Row 2, Column One
			</div>
		</div>
		<div class='column'>
			<div class='orange-column'>
				Some Text in Row 2, Column Two
			</div>
		</div>
		<div class='column'>
			<div class='blue-column'>
				Some Text in Row2, Column Three
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='double-column'>
			<div class='blue-column'>
				Some Text in row 3 double column 1
			</div>
		</div>
		<div class='column'>
			something in row 3 column 2
		</div>
	</div>
</div>
@endsection