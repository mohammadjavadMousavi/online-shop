@extends('admin.layout.master')

@section('content')
		
	
	<div class="row">
	    <div class="col-12"> 
		    <div class="box">
		            <div class="box-header with-border">
		              <h1 class="box-title">دسته ویژه</h1>
		            </div>
		            <!-- /.box-header -->
		        <div class="box-body">
		        	<form action="{{ route('featuredCategory.store') }}" method="post">
		        		
		        		@csrf

		        		<div class="form-group">
		        			<label for="category_id">انتهاب دسته ویژه</label>
		        			<select name="category_id" id="category_id" class="form-control">
		        				<option value="" disabled="" selected="">دسته ویژه را انتخاب کنید</option>

		        				@foreach ($categories as $category)
		        					<option

		        					@if ($category->id == $featuredCategory->category_id)
		        						selected
		        					@endif

		        					 value="{{ $category->id }}">{{ $category->title }}</option>
		        				@endforeach
		        			</select>
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

