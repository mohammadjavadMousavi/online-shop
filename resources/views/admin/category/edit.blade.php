@extends('admin.layout.master')

@section('content')
		
	
	<div class="row">
	    <div class="col-12"> 
		    <div class="box">
		            <div class="box-header with-border">
		              <h1 class="box-title">ویرایش دسته بندی</h1>
		            </div>
		            <!-- /.box-header -->
		        <div class="box-body">
		        	<form action="/adminpanel/category/{{ $category->id }}" method="post">
		        		
		        		@csrf
		        		@method('PATCH')

		        		<div class="form-group">
		        			<label for="category_id">دسته والد</label>
		        			<select name="category_id" id="category_id" class="form-control">
		        				<option value="" disabled="" selected="">دسته والد را انتخاب کنید</option>

		        				@foreach ($categories as $parent)
		        					<option

		        					@if ($parent->id == $category->category_id)
		        						selected
		        					@endif

		        					 value="{{ $parent->id }}">{{ $parent->title }}</option>
		        				@endforeach
		        			</select>
		        		</div>
		        		
		        		<div class="form-group">
		        			<label for="title">عنوان</label>
		        			<input type="text" name="title" class="form-control" id="title" value="{{ $category->title }}">
		        		</div>

						<div class="form-group">
		        			<label>انتخاب  گروه مشخصلت </label>
		        			<div class="row">
		        				@foreach ($properties as $property)
		        				<label class="col-sm-1">
		        					<input style="position: static; opacity: 1;" 

		        					@if ($category->hasPropertyGroup($property))
		        						checked 
		        					@endif

		        					type="checkbox" name="properties[]" value="{{ $property->id }}">{{ $property->title }}

		        				</label>
		        				@endforeach
		        			</div>
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

