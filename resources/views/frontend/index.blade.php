@extends('layout.frontend')
@section('content')
@include('frontend.slider')
<div class="container d-flex justify-content-center product-area pt-60 pb-50">
    <div class="row">
       <!-- start -->
        <div class="col-lg-12">
                     <div class="li-product-tab">
                        <ul class="nav li-product-menu">
                           <li>
                              <a class="active" data-toggle="tab" href="#li-new-product"><span>New Arrival</span></a>
                           </li>
                           <li>
                              <a data-toggle="tab" href="#li-bestseller-product"><span>Bestseller</span></a>
                           </li>
                           <li>
                              <a data-toggle="tab" href="#li-featured-product"><span>Featured Products</span></a>
                           </li>
                        </ul>
                     </div>
                     <!-- Begin Li's Tab Menu Content Area -->
        </div>
       <!-- end -->
       
       @foreach($all_books as $book)
        <div class="col-md-3 mt-100">

            <div class="product-wrapper  text-center">
                <input type="hidden" id="id" value="{{$book->id}}">
                <div class="product-img-1"> <a href="{{route('singleBook',$book->id)}}" data-abc="true"> <img src="{{asset('covers/'.$book->cover)}}" alt="" height="190" width="170"> </a>

                    
                </div>
                <div class="add-to-cart-div">
                  <a href="#" class="add-to-cart btn btn-dark buy-btn">
                    <span>Buy now <i class="fa fa-shopping-cart" style="color:white;"></i></span>
                  </a>
                </div>
                <div class="book-details" style="margin-top:5px;">
                        <a href="{{route('singleBook',$book->id)}}">{{$book->title}}</a>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    
</div>
<div class="d-flex justify-content-center" id="pagination">
          {!! $all_books->links() !!}
</div>
@endsection