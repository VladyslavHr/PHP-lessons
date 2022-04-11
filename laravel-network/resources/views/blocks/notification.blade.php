@if(session('notification'))
<div class="alert alert-warning alert-dismissible fade show">
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
{{ session('notification') }}
</div>
@endif
