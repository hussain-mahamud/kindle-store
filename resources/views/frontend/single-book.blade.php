@extends('layout.frontend')
@section('content')
<div class="content-wraper">
   <div class="container">
      <div class="row single-product-area">
         <div class="col-lg-3 col-md-5">
            <!-- Product Details Left -->
            <div class="product-details-left">
               <div class="product-details-images slider-navigation-1">
                  <div class="lg-image">
                     
                     <img src="{{asset('covers/'.$book->cover)}}" alt="book cover" class="single-book-cover-img">
                     
                  </div>
               </div>
            </div>
            <!--// Product Details Left -->
         </div>
         <div class="container col-lg-6 col-md-7">
            <div class="product-details-view-content">
               <div class="product-info product-wrapper">
               	<input type="hidden" id="id" value="{{$book->id}}">
                  <h2>{{$book->title}}</h2>
                  <span class="product-details-ref">ASIN: {{$book->asin}}</span>
                  <br><span class="product-details-ref">Writer: <a href="#">{{$book->author}}</a> </span>
                  @if($book->co_author)
                  <span class="product-details-ref">, <a href="">{{$book->author}}</a></span>
                  @endif
                  <div class="rating-box pt-20">
                     <ul class="rating rating-with-review-item">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
               
                        <li class="review-item"><a href="#">Read Review</a></li>
                        <li class="review-item"><a href="#reviews">Write Review</a></li>
                     </ul>
                  </div>
                  <div class="price-box pt-20">
                     <span class="new-price new-price-2">${{$book->price}}</span>
                  </div>
                  <div class="product-desc">
                     <p>{!! $book->description !!}</p>
                  </div>
                  
                  <div class="add-to-cart-div" style="margin-bottom: 20px;">
                  	<a href="#" class="add-to-cart btn btn-dark buy-btn">
                    	<span>Buy now <i class="fa fa-shopping-cart" style="color:white;"></i></span>
                  	</a>
                </div>
                  
               </div>
            </div>
         </div>
         
      </div>
   </div>
</div>


<div class="product-area pt-35">
    <div class="container">
    	<div class="row">
            <div class="col-lg-12">
            	<div class="li-product-tab">
                        <ul class="nav li-product-menu">
                           <li><a data-toggle="tab" href="#reviews"><span>Reviews</span></a></li>
                        </ul>               
                </div>
                            <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
        	 <div id="reviews" class="tab-pane tab-pane active show" role="tabpanel">
        	     <div class="product-reviews" id="product-reviews">
        	         <div class="product-details-comment-block">
        	             <div class="comment-review">
        	                 <span>Grade</span>
        	                 <ul class="rating">
        	                     <li><i class="fa fa-star"></i></li>
        	                     <li><i class="fa fa-star"></i></li>
        	                     <li><i class="fa fa-star"></i></li>
        	                     
        	                 </ul>
        	             </div>
        	             <div class="comment-author-infos pt-25">
        	                 <span>HTML 5</span>
        	                 <em>01-12-18</em>
        	             </div>
        	             
        	             <div class="review-btn">
        	                 <a class="review-links"  >Write Your Review!</a>
        	             </div>
        	            <div class="review-submit-section">
        	            	@error('field-name')
        	            	    <div class="alert alert-danger">{{ $message }}</div>
        	            	@enderror
        	            	<div class="col-md-3 col-xs-6">
        	            	   <label for="name" class="form-label">Name*</label>
        	            	   <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
        	            	</div>
        	            	<div class="col-md-3 col-xs-6">
        	            	   <label for="name" class="form-label">Email*</label>
        	            	   <input type="email" class="form-control" id="name" name="email" required value="{{old('email')}}">
        	            	</div>
        	            	<div class="col-md-3 col-xs-6">
        	            	   <label for="name" class="form-label">Review*</label>
        	            	   <textarea type="text" class="form-control" id="name" name="review" required value="{{old('review')}}">
        	            	   	</textarea> 
        	            	</div>
        	            	<div class="col-md-12 col-xs-12 submit-review-div">	
        	            		<a href="#" class="btn btn-dark submit-review">Submit</a>
        	            	</div>
        	            </div>
        	         </div>
        	     </div>
        	 </div>
        </div>
    </div>
    <div class="container pb-50">
        <div class="row">
           <!-- start -->
            <div class="col-lg-12">
             <div class="li-product-tab">
                <ul class="nav li-product-menu">
                   <li>
                      <a class="active" data-toggle="tab" href="#li-new-product"><span>Related Books</span></a>
                   </li>
                  
                </ul>
             </div>
                         <!-- Begin Li's Tab Menu Content Area -->
            </div>
           <!-- end -->
           
           @foreach($category_wise_book as $book)
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
</div>


@endsection
