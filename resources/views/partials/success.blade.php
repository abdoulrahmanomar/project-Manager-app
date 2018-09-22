
@if(Session()->has('success'))
<div class="alert alert-success alert-dismissable fade show">
	<button type="button" class="close" data-dismiss="alert" arial-label="close">
		
		<span aria-hidden="true">&times;</span>
	</button>
	<strong>{{Session()->get('success')}}</strong>
</div>
@endif
