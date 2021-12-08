@extends('admin.layout.master')

@section('content')
		
	
	<div class="row">
	    <div class="col-12"> 
		    <div class="box">
		            <div class="box-header with-border">
		              <h1 class="box-title">آپدیت محصول {{ $product->name }}</h1>
		            </div>
		            <!-- /.box-header -->
		        <div class="box-body">
		        	<form action="{{ route('product.update',$product) }}" method="post" enctype="multipart/form-data">
		        		
		        		@csrf

		        		@method('PATCH')


		        		<div class="form-group">
		        			<label for="category_id">دسته بندی</label>
		        			<select class="form-control" id="category_id" name="category_id">
		        				<option value="" disabled="" selected="">دسته بندی خود را انتخاب کنید.</option>

		        				@foreach ($categories as $category)
									<option

									@if ($category->id == $product->category_id)
										selected
									@endif

									 value="{{ $category->id }}">{{ $category->title }}</option>
		        				@endforeach	
		        			</select>
		        		</div>

						<div class="form-group">
		        			<label for="brand_id">برند</label>
		        			<select class="form-control" id="brand_id" name="brand_id">
		        				<option value="" disabled="" selected="">برند خود را انتخاب کنید</option>

		        				@foreach ($brands as $brand)
									<option

									@if ($brand->id == $product->brand_id)
										selected
									@endif

									 value="{{ $brand->id }}">{{ $brand->name }}</option>
		        				@endforeach	
		        			</select>
		        		</div>

		        		<div class="form-group">
		        			<label for="name">نام</label>
		        			<input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}">
		        		</div>

						<div class="form-group">
		        			<label for="slug">اسلاگ</label>
		        			<input type="text" name="slug" class="form-control" id="slug" value="{{ $product->slug }}">
		        		</div>

		        		<div class="form-group">
		        			<label for="price">قیمت</label>
		        			<input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}">
		        		</div> 

		        		<div class="form-group">
		        			<div class="row">
		        				<div class="col-sm-6">
		        					<label for="image">تصویر</label>
		        					<input type="file" name="image" class="form-control" id="image">
		        				</div>
		        				<div class="col-sm-6">
		        					<img src="{{ str_replace('public','/storage', $product->image) }}" class="form-control">
		        				</div>
		        			</div>
		        		</div>

		        		<div class="form-group">
		        			<label for="description">توضیحات</label>
		        			<textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
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

