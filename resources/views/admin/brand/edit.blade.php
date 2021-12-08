@extends('admin.layout.master')

@section('content')
		
	
	<div class="row">
	    <div class="col-12"> 
		    <div class="box">
		            <div class="box-header with-border">
		              <h1 class="box-title">ویرایش برند {{ $brand->name }}</h1>
		            </div>
		            <!-- /.box-header -->
		        <div class="box-body">
		        	<form action="{{ route('brand.update', $brand) }}" method="post" enctype="multipart/form-data">
		        		
		        		@csrf

		        		@method('PATCH')

		        		<div class="form-group">
		        			<label for="name">نام</label>
		        			<input type="text" name="name" class="form-control" id="name" value="{{ $brand->name }}">
		        		</div>

		        		<div class="form-group">
		        			<div class="row">
		        				<div class="col-sm-6">
		        					<label for="image">تصویر</label>
		        					<input type="file" name="image" id="image" class="form-control">
		        				</div>
		        				<div class="col-sm-6">
		        					<img src="{{ str_replace('public','/storage',$brand->image) }}" width="150">
		        				</div>
		        			</div>
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

