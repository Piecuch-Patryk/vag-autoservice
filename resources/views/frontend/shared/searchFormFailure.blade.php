@if (session('failure'))
	<div>
		<p class="text-danger m-0">
			{{ session('failure') }} <strong>{{ session('old_search') }}</strong>
		</p>
	</div>
@endif