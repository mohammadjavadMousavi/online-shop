@extends('admin.layout.master')

@section('content')
		
	
	<div class="row">
	    <div class="col-12 col-sm-6"> 
		    <div class="box">
		            <div class="box-header with-border">
		              <h1 class="box-title">ایجاد تخفیف</h1>
		            </div>
		            <!-- /.box-header -->
		        <div class="box-body">
		        	<form action="{{ route('product.discount.store',$product) }}" method="post">
		        		
		        		@csrf


		        		<div class="form-group">
		        			<label for="value">مقدار تخفیف</label>
		        			<input type="number" name="value" class="form-control" id="value" max="100" min="1">
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

