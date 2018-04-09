
@extends('app')

@section('main-content')

@if (session('status'))
  <div id="myElem" class="alert alert-success">
      {{ session('status') }}
  </div>
@endif
<div>
  <refactory-component />
</div>
@endsection
