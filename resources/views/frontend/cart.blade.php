@extends('layout.frontend')

@section('content')
<div class="breadcrumb-area">
   <div class="container">
      <div class="breadcrumb-content">
         <ul>
            <li><a href="{{route('home')}}">Home</a></li>
            <li class="active">Shopping Cart</li>
         </ul>
      </div>
   </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Shopping Cart Area Strat-->
<div class="Shopping-cart-area pt-60 pb-60">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <form action="#">
               <div class="table-content table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th class="li-product-remove">remove</th>
                           <th class="li-product-thumbnail">images</th>
                           <th class="cart-product-name">Product</th>
                           <th class="li-product-price">Unit Price</th>
                           <th class="li-product-quantity">Quantity</th>
                           <th class="li-product-subtotal">Total</th>
                        </tr>
                     </thead>
                     <tbody>
                     	<?php $contents=Cart::content(); ?>
                     	 @foreach($contents as $content)
                        <tr>
                        	<input type="hidden" class="rowId" value="{{$content->rowId}}">
                           <td class="li-product-remove" style="cursor:pointer;"><i class="fa fa-times remove_item" title="Remove"></i></td>
                           <td class="li-product-thumbnail"><a href="#"><img src="{{asset('covers/'.$content->options->img)}}" alt="Li's Product Image" height="80" width="60"></a></td>
                           <td class="li-product-name"><a href="#">{{$content->name}}</a></td>
                           <td class="li-product-price"><span class="amount">${{$content->price}}</span></td>
                           <td class="quantity">
                              <label>Quantity</label>
                              {{$content->qty}}
                           </td>
                           <td class="product-subtotal"><span class="amount">${{$content->price*$content->qty}}</span></td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <div class="row">
                  <div class="col-12">
                     <div class="coupon-all">
                        <div class="coupon">
                           <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                           <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                        </div>
                        
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-5 ml-auto">
                     <div class="cart-page-total">
                        <h2>Cart totals</h2>
                        <ul>
                           <li>Subtotal <span>${{Cart::subtotal()}}</span></li>
                           <li>Total <span>${{Cart::total()}}</span></li>
                        </ul>
                        <a href="#">Proceed to checkout</a>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

@endsection