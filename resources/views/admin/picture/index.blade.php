@extends('admin.layout.master')

@section('content')
	

	<div class="row">

		<div class="col-sm-34">
			<div class="card">
				<div class="card-body">
					<form action="{{ route('product.pictures.store',$products) }}" method="post" enctype="multipart/form-data">

						@csrf

						<label for="image">آپلود عکس</label>
						<input type="file" name="image" id="image" class="form-control mb-5">

						<input type="submit" name="btn" class="btn btn-sm btn-info" value="upload" class="form-control">
					</form>
				</div>
			</div>
		</div>


		@foreach ($products->pictures as $product)
			   <!-- /.col -->
        <div class="col-md-12 col-lg-3">
          <div class="card">
              <img class="card-img-top img-responsive" src="{{ str_replace('public','/storage',$product->path) }}" alt="Card image cap">
            <div class="card-body">            	

            		<form action="{{ route('product.pictures.destroy',['product' => $products ,'picture' => $product])}}" method="post">
            			
            			@csrf
            			@method('DELETE')

            			<input type="submit" name="btn" value="حذف" class="btn btn-danger btn-sm">
            		</form>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

		@endforeach
	</div>
	@include('admin.layout.errors');


@endsection