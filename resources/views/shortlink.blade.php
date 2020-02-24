@extends('layouts.app')

@section('content')
	<div class="container">
	<h2>Заметки</h2>
	<div class="row">
		<div class="col-sm-6">
		@include('editablePost')
		</div>
	</div>
	</div>
@endsection