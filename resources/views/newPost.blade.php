
<form action="{{ route('posts.index')}}" method="POST" class="form-horizontal">
	@csrf
	<div class="container">
		<h3>Новая заметка</h3>
	<div class="col">
		<div class="row"> <label>Заголовок</label> </div>
		<div class="row">
			<textarea id="title" name="title" rows="1" cols="45"></textarea>
		</div>
		<div class="row"> <label>Время жизни, мин (0 = бессрочно)</label> </div>
			<div class="row">
				<input type="number" id="lifetime" name="lifetime" min="0" max="1000000" value="40" step="1"></input>
			</div>
		<div class="row"> <label>Текст заметки</label> </div>
		<div class="row">
			<textarea id="text" name="text" rows="5" cols="45"></textarea>
		</div>

		<div class="row">
			<button type="submit" class="btn btn-success">
				<i class="fa fa-plus"></i> Сохранить заметку
			</button>
		</div>
	</div>
	</div>
</form>
