@extends('layouts.app')

@section('content')
<div class="col">

  <div class="item">Item 0</div>
  <div class="init-row">
    <div class="item">ITEM 1</div>
    <div class="item">Item 2</div>
    <div class="item col">
      <div class="item">Item 3</div>
      <div class="item">Item 4</div>
    </div>
  </div>
  <div class="item">Item 5</div>
</div>
@endsection