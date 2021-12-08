@extends('admin.layout.master')

@section('content')
		
	
	<div class="row">
	    <div class="col-12"> 
		    <div class="box">
		            <div class="box-header with-border">
		              <h1 class="box-title">ساخت کد تخفیف</h1>
		            </div>
		            <!-- /.box-header -->
		        <div class="box-body">
		        	<form action="{{ route('offer.update',$offer) }}" method="post">
		        		
		        		@csrf
		        		@method('PATCH')

		        	

		        		<div class="form-group">
		        			<label for="code">کد</label>
		        			<input type="text" name="code" class="form-control" id="code" value="{{ $offer->code }}">
		        		</div>

		        		<div class="form-group">
		        			<label for="starts_at">تاریخ آغاز</label>
		        			<input type="date" name="starts_at" class="form-control" id="starts_at" value="{{ $offer->starts_at }}">
		        		</div>

		        		<div class="form-group">
		        			<label for="expires_at">تاریخ پایان</label>
		        			<input type="date" name="expires_at" class="form-control" id="expires_at" value="{{ $offer->expires_at }}">
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

