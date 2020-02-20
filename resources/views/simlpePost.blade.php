
Автор: {{$p->user->id == 0?"Аноним":$p->user->name}}
<div>Дата: {{$p->created_at}}</div>
<input type="hidden" id="id" class="form-control" value="{{$p->id}}">
<input type="text" id="{{$p->id}}title" class="form-control" value="{{$p->title}}" disabled="true">
<div>Исходный текст:</div>
<textarea type="text" id="{{$p->id}}text" class="form-control" rows="4" disabled="true">{{$p->text}}
</textarea> 
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<pre class="prettyprint">{{$p->text}}</pre>
