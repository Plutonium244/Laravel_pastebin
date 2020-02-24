@extends('layouts.app')

@section('content')
	@if (Session::has('shortlink'))
	<div class="alert alert-success">
		{{ Session::get('shortlink') }}
	</div>
	@endif
	<div class="container">
	<h2>Заметки</h2>
	<div class="row">
	@foreach ($posts as $p)
		<div class="col-sm-4">
			@if (isset(auth()->user()->id) && isset($p->user->id))
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