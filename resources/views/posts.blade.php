@extends('layouts.app')

@section('content')
	<div class="container">
	<h2>Заметки</h2>
	<div class="row">
	@foreach ($posts as $p)
		<div class="col-sm-4">
			@if (isset(auth()->user()->id))
				@if (auth()->user()->id == $p->user->id)
					@include('editablePost')
				@else
					@include('simlpePost')
				@endif
			@else
				@include('simlpePost')
			@endif
		</div>
	@endforeach
	</div>
	</div>

	@include('newPost')

@endsection