@extends('admin.layout.master')

@section('content')
		
	
	<div class="row">
	    <div class="col-12"> 
		    <div class="box">
		            <div class="box-header with-border">
		              <h1 class="box-title">ایجاد نقش</h1>
		            </div>
		            <!-- /.box-header -->
		        <div class="box-body">
		        	<form action="{{ route('role.store') }}" method="post">
		        		
		        		@csrf

		        

		        		<div class="form-group">
		        			<label for="title">نقش</label>
		        			<input type="text" name="title" class="form-control" id="title">
		        		</div>

		        		<div class="form-group">
		        			<label>انتخاب دسترسی </label>
		        			<div class="row">
		        				@foreach ($permissions as $permission)
		        				<label class="col-sm-1">
		        					<input style="position: static; opacity: 1;" type="checkbox" name="permissions[]" value="{{ $permission->id }}">{{ $permission->title }}

		        				</label>
		        				@endforeach
		        			</div>
		        		</div>

		        		<div class="form-group">
		        			<input class="btn btn-primary btn-sm" type="submit" name="submit" value="ثبت">
		        		</div>
		        	</form>

		        		@include('admin.layout.errors');
	       		</div>

     	 	</div>
		</div>
	</div>


@endsection

