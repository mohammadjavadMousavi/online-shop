@if (session()->has('success'))
	


<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

	<h4><i class="icon fa fa-check"></i> نوتیفیکیشن </h4>

	{{ session()->get('success') }}
</div>

@endif
