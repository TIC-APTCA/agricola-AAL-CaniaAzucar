<ul class="list-group">
	@if (Session::has($flash_messages))
	<li class="list-group-item list-group-item-success">{{ Session::get($flash_messages) }}</li>
	@endif
</ul>