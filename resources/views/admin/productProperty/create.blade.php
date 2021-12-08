@extends('admin.layout.master')

@section('content')
		
	
	<div class="row">
	    <div class="col-12"> 
		    <div class="box">
		            <div class="box-header with-border">
		              <h1 class="box-title">ویژگی محصولات</h1>
		            </div>
		            <!-- /.box-header -->



		            @php

		            	$propertyGroup = $product->category->propertyGroup;

		            @endphp	
		        <div class="box-body">
		        	<form action="{{ route('product.property.store',$product) }}" method="post" enctype="multipart/form-data">
		        		
		        		@csrf


			        		@foreach ($propertyGroup as $groups)
			        			<h3 class="">{{ $groups->title }}</h3>

			        			<div class="row">

			        			@foreach ($groups->properties as $property)
			        				
			        				<div class="form-group col-sm-6">
				        				<label class="col-sm-3" for="name">{{ $property->title }}</label>
				        				<input class="col-sm-8" type="text" name="properties[{{ $property->id }}][value]" id="name" class="form-control" value="{{ $property->ValueForProduct($product) }}">

			        				</div>


			        			@endforeach
			        			</div>

			       

			        		@endforeach
			        	

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

