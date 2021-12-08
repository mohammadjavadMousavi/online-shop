@extends('admin.layout.master')

@section('content')
		
	
	<div class="row">
	    <div class="col-12"> 
		    <div class="box">
		            <div class="box-header with-border">
		              <h1 class="box-title">محصول جدید</h1>
		            </div>
		            <!-- /.box-header -->
		        <div class="box-body">
		        	<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
		        		
		        		@csrf


		        		<div class="form-group">
		        			<label for="category_id">دسته بندی</label>
		        			<select class="form-control" id="category_id" name="category_id">
		        				<option value="" disabled="" selected="">دسته بندی خود را انتخاب کنید.</option>

		        				@foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->title }}</option>
		        				@endforeach	
		        			</select>
		        		</div>

						<div class="form-group">
		        			<label for="brand_id">برند</label>
		        			<select class="form-control" id="brand_id" name="brand_id">
		        				<option value="" disabled="" selected="">برند خود را انتخاب کنید</option>

		        				@foreach ($brands as $brand)
									<option value="{{ $brand->id }}">{{ $brand->name }}</option>
		        				@endforeach	
		        			</select>
		        		</div>

		        		<div class="form-group">
		        			<label for="name">نام</label>
		        			<input type="text" name="name" class="form-control" id="name">
		        		</div>

						<div class="form-group">
		        			<label for="slug">اسلاگ</label>
		        			<input type="text" name="slug" class="form-control" id="slug">
		        		</div>

		        		<div class="form-group">
		        			<label for="price">قیمت</label>
		        			<input type="number" name="price" class="form-control" id="price">
		        		</div> 

		        		<div class="form-group">
		        			<label for="image">تصویر</label>
		        			<input type="file" name="image" class="form-control" id="image">
		        		</div>

		        		<div class="form-group">
		        			<label for="description">توضیحات</label>
		        			<textarea name="description" id="description" class="form-control"></textarea>
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

