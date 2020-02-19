@extends('layouts.app')

@section('content')
	<div class="container">
	<h2>Заметки</h2>
	<div class="row">
	@foreach ($posts as $p)
			<div class="col-sm-4">
				@if (isset(auth()->user()->id))
				@if (auth()->user()->id == $p->user->id)
				<form action="{{ route('posts.update', $p->id)}}" method="POST" class="form-horizontal">
					@csrf
					@method ('PUT')
					<div>
						Автор: {{$p->user->id == 0?"Аноним":$p->user->name}}
						
						<button type="submit" class="btn btn-default btn-sm bnt-nopadding">
							<img class="edit" src="../icons/save.jpeg">
						</button>
						<div>Дата: {{$p->created_at->format('d-m-Y')}}</div>

						<input type="text" name="title" class="form-control" value="{{$p->title}}" >
						<div>Исходный текст:</div>
						<textarea type="text" name="text" class="form-control" rows="4" >{{$p->text}}</textarea> 
						<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
						<pre class="prettyprint">{{$p->text}}</pre>
						
					</div>
				</form>
				@else
				<div>
					Автор: {{$p->user->id == 0?"Аноним":$p->user->name}}
					<div>Дата: {{$p->created_at->format('d-m-Y')}}</div>
					<input type="hidden" id="id" class="form-control" value="{{$p->id}}">
					<input type="text" id="{{$p->id}}title" class="form-control" value="{{$p->title}}" disabled="true">
					<div>Исходный текст:</div>
					<textarea type="text" id="{{$p->id}}text" class="form-control" rows="4" disabled="true">{{$p->text}}
					</textarea> 
					<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
					<pre class="prettyprint">{{$p->text}}</pre>
					
				</div>
				@endif
				@endif

				
			</div>
	@endforeach
	</div>
	</div>

	@include('newPost')

@endsection