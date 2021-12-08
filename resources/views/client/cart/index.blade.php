@extends('client.layout.master')

@section('content')
	

	 <div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="cart.html">سبد خرید</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">سبد خرید</h1>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">تصویر</td>
                    <td class="text-left">نام محصول</td>
                    <td class="text-left">مدل</td>
                    <td class="text-left">تعداد</td>
                    <td class="text-right">قیمت واحد</td>
                    <td class="text-right">کل</td>
                  </tr>
                </thead>
                <tbody>

                	@foreach ($items as $item)
                	{{-- @php
                		$product = $item['product'];
                	@endphp --}}
                		
                  <tr>
                    <td class="text-center"><a href="product.html"><img width="100" src="{{ str_replace('public','/storage',$item['product']->image) }}" alt="{{ $item['product']->name }}" title="{{ $item['product']->name }}" class="img-thumbnail" /></a></td>
                    <td class="text-left">
                    	<a href="product.html">{{ $item['product']->name }}</a>
                    	<br />
                      <small>امتیازات خرید: {{ $item['product']->price_with_discount }}</</small>
                  	</td>
                    <td class="text-left">{{ $item['product']->brand->name }}</</td>
                    <td class="text-left"><div class="input-group btn-block quantity">
                        <input type="text" name="quantity" id="input-quantity" value="{{ $item['quantity'] }}" size="1" class="form-control" />
                        <span class="input-group-btn">
                        <button type="submit" onclick="addToCart({{ $item['product']->id }})" data-toggle="tooltip" title="بروزرسانی" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                        <button type="button" data-toggle="tooltip" title="حذف" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button>
                        </span></div></td>
          <td class="text-right"><span id="quantity-pro{{ $item['product']->id }}">{{ $item['product']->price_with_discount * $item['quantity'] }}</span>ت ومان</td>
                    <td class="text-right"><span id="quantity-product{{ $item['product']->id }}">{{ $item['product']->price_with_discount * $item['quantity'] }}</span> تومان</td>
                  </tr>

                	@endforeach


                </tbody>
              </table>
            </div>
     
          <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
              <table class="table table-bordered">
                <tr>
                  <td class="text-right"><strong>جمع کل:</strong></td>
                  <td class="text-right">{{ $totalAmount  }} تومان</td>
                </tr>
              
                <tr>
                  <td class="text-right"><strong>قابل پرداخت :</strong></td>
                  <td class="text-right">{{ $totalAmount  }} تومان</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="buttons">
            <div class="pull-left"><a href="index.html" class="btn btn-default">ادامه خرید</a></div>
            <div class="pull-right"><a href="checkout.html" class="btn btn-primary">تسویه حساب</a></div>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>


@endsection