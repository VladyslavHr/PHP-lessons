@if(session('status'))
<div class="alert alert-success">
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
{{ session('status') }}
</div>
@endif
