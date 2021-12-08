@extends('admin.layout.master')

@section('content')
		
	
	<div class="row">
	    <div class="col-12"> 
		    <div class="box">
		            <div class="box-header with-border">
		              <h1 class="box-title">ویرایش گروه مشخص</h1>
		            </div>
		            <!-- /.box-header -->
		        <div class="box-body">
		        	<form action="{{ route('propertyGroup.update',$property) }}" method="post">
		        		
		        		@csrf

		        		@method('PATCH')
		        
		        		<div class="form-group">
		        			<label for="title">عنوان</label>
		        			<input type="text" name="title" class="form-control" value="{{ $property->title }}" id="title">
		        		</div>

		        		<div class="form-group">
		        			<input class="btn btn-primary btn-sm" type="submit" name="submit" value="ثبت">
		        		</div>
		        	</form>
	       		</div>
	       		@include('admin.layout.errors');
     	 	</div>
		</div>
	</div>


@endsection

