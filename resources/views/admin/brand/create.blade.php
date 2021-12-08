@extends('admin.layout.master')

@section('content')
		
	
	<div class="row">
	    <div class="col-12"> 
		    <div class="box">
		            <div class="box-header with-border">
		              <h1 class="box-title">برند جدید</h1>
		            </div>
		            <!-- /.box-header -->
		        <div class="box-body">
		        	<form action="/adminpanel/brand" method="post" enctype="multipart/form-data">
		        		
		        		@csrf


		        		<div class="form-group">
		        			<label for="name">نام</label>
		        			<input type="text" name="name" class="form-control" id="name">
		        		</div>

		        		<div class="form-group">
		        			<input type="file" name="image" class="form-control">
		        		</div>

		        		<div class="form-group">
		        			<input class="btn btn-primary btn-sm" type="submit" name="submit" value="ثبت">
		        		</div>
		        	</form>
	       		</div>

     	 	</div>

     	 	    
     	 	@include('admin.layout.errors');

     	 	
		</div>
	</div>


@endsection

