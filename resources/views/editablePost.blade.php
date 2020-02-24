
<form action="{{ route('posts.update', $p->id)}}" method="POST" class="form-horizontal">
	@csrf
	@method ('PUT')
		Автор: {{isset($username)?$username:$p->user->name}}
		<button type="submit" class="btn btn-default btn-sm bnt-nopadding">
			<img class="edit" src="../icons/save.jpeg">
		</button>
		<div>Дата: {{$p->created_at}}</div>

		<input type="text" name="title" class="form-control" value="{{$p->title}}" >
		<div>Исходный текст:</div>
		<textarea type="text" name="text" class="form-control" rows="4" >{{$p->text}}</textarea> 
		<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
		<pre class="prettyprint">{{$p->text}}</pre>
</form>
<form action="{{ route('posts.destroy', $p->id)}}" method="POST" class="form-horizontal">
	@csrf
	@method ('DELETE')
	<button type="submit" class="btn btn-default btn-sm bnt-nopadding">
		<img class="delete" src="../icons/delete.png">
	</button>
</form>