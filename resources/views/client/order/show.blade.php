@extends('client.layout.master')

@section('content')
	

	
<div id="container">
    <div class="container">
    	<div class="row">
    		<div class="col-sm-8">
    			@if ($order->payment_status == 'OK')
    				<p class="bg-success">پرداخت با موفقیت انجام شد</p>
    			@else
    				<p class="bg-danger">پرداخت ناموفق بود</p>
    			@endif
    		</div>
    	</div>
    </div>
</div>


@endsection