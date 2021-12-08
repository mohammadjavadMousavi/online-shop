@extends('admin.layout.master')

@section('content')
		
	
	<div class="row">
	    <div class="col-12"> 
		    <div class="box">
		            <div class="box-header with-border">
		              <h1 class="box-title">ساخت گروه مشخص</h1>
		            </div>
		            <!-- /.box-header -->
		        <div class="box-body">
		        	<form action="{{ route('property.store') }}" method="post">
		        		
		        		@csrf

		        
		        		<div class="form-group">
		        			<label for="title">عنوان</label>
		        			<input type="text" name="title" class="form-control" id="title">
		        		</div>

		        		<div class="form-group">
		        			<label for="property_groups_id">گروه مشخصات</label>
		        			<select name="property_groups_id" id="property_groups_id" class="form-control">
		        				<option value="" disabled="" selected="">گروه مشخصات را انتخاب کنید</option>

		        				@foreach ($groups as $group)
		        					<option value="{{ $group->id }}">{{ $group->title }}</option>
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

