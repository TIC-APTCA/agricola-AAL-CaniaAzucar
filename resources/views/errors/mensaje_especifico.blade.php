<ul class="list-group">
	@if (Session::has($flash_errors))
	<li class="list-group-item list-group-item-danger">{{ Session::get($flash_errors) }}</li>
	@endif
</ul>