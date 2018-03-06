<ul class="list-group">
	@if ($errors->any())
		@foreach($errors->all() as $errores)
		<li class="list-group-item list-group-item-danger">{{ $errores }}</li>
		@endforeach
	@endif
</ul>