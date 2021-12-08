@extends('client.layout.master')

@section('content')
	

<div id="container">
    <div class="container">

      <form action="{{ route('client.order.store') }}" method="post">

        @csrf
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="cart.html">سبد خرید</a></li>
        <li><a href="checkout.html">تسویه حساب</a></li>
      </ul>
    
      	  <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title">تسویه حساب</h1>
              @include('admin.layout.errors');

          <div class="row">
			

                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-ticket"></i> استفاده از کوپن تخفیف</h4>
                    </div>
                      <div class="panel-body">
                        <label for="input-coupon" class="col-sm-3 control-label">کد تخفیف خود را وارد کنید</label>
                      

                        {{-- <form action="{{ route('client.order.offer') }}" method="post"> --}}
                          {{-- @csrf --}}

                            <div class="input-group">
                              <input type="text" class="form-control" id="input-coupon" placeholder="کد تخفیف خود را در اینجا وارد کنید" value="" name="coupon">
                              <span class="input-group-btn">
                              {{-- <input type="submit" class="btn btn-primary" data-loading-text="بارگذاری ..." id="button-coupon" value="اعمال کوپن"> --}}
                              </span>
                            </div>

                        {{-- </form> --}}
                          

                      </div>
                  </div>
                </div>
  
        
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> سبد خرید</h4>
                    </div>
                      <div class="panel-body">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <td class="text-center">تصویر</td>
                                <td class="text-left">نام محصول</td>
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
                        <input type="text" name="quantity" id="input-quantity{{ $item['product']->id }}" value="{{ $item['quantity'] }}" size="1" class="form-control" />
                        <span class="input-group-btn">
                        <button type="button" onclick="addToCart({{ $item['product']->id }})" data-toggle="tooltip" title="بروزرسانی" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                        <button type="button" data-toggle="tooltip" title="حذف" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></button>
                        </span></div></td>
       					   <td class="text-right"><span id="quantity-pro{{ $item['product']->id }}">{{ $item['product']->price_with_discount * $item['quantity'] }}</span>ت ومان</td>
         	          
           		       </tr>

                	@endforeach


                </tbody>
                            <tfoot>
                              <tr>
                                <td class="text-right" colspan="4"><strong>کل :</strong></td>
                                <td class="text-right"><span id="total_amount_order">{{ \App\Models\Cart::totalAmount() }}</span> تومان</td>
                              </tr>
                             
                            </tfoot>
                          </table>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-pencil"></i>آدرس خود را وارد کنید</h4>
                    </div>
                      <div class="panel-body">
                        <textarea rows="4" class="form-control" id="confirm_comment" name="address"></textarea>
                        <br>
                       
                        <div class="buttons">
                          <div class="pull-right">
                            <input type="submit" class="btn btn-primary" id="button-confirm" value="ثبت سفارش">
                          </div>
                        </div>
                      </div>
                  </div>
                </div>         
          </div>
        </div>
        <!--Middle Part End -->
      </div>

      </form>

    </div>
  </div>


@endsection