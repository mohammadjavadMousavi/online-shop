@extends('admin.layout.master')

@section('content')
		
	
	<div class="row">
	    <div class="col-12"> 
		    <div class="box">
		            <div class="box-header with-border">
		              <h1 class="box-title">ویرایش اسلاید</h1>
		            </div>
		            <!-- /.box-header -->
		        <div class="box-body">
		        	<form action="{{ route('slide.update',$slide) }}" method="post" enctype="multipart/form-data">
		        		
		        		@csrf
		        		@method('PATCH')


		        		<div class="form-group">
		        			<label for="link">لینک</label>
		        			<input type="text" name="link" class="form-control" id="link" value="{{ $slide->link }}">
		        		</div>

		        		<div class="form-group">
		        			<div class="row">
		        				<div class="col-sm-6">
		        					<label for="image">تصویر</label>
		        					<input type="file" name="image" id="image" class="form-control">
		        				</div>
		        				<div class="col-sm-6">
		        					<img src="{{ str_replace('public','/storage',$slide->image) }}" width="150">
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

