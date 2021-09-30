@extends('layout.frontend')
@section('content')

<div class="container pb-50">
    <div class="row">
       <!-- start -->
        <!-- <div class="col-lg-12">
           <div class="li-product-tab">
              <ul class="nav li-product-menu">
                 <li >
                    <a class="active btn btn-warning" data-toggle="tab" href="#li-new-product"><span>{{$cat_name[0]->cat_name}}</span></a>
                 </li>
                 <li>
              </ul>
           </div>
        </div> -->
        <div class="col-xs-12 col-md-12">
          <h4>{{$cat_name[0]->cat_name}}</h4>
          <hr style="margin-top: 0;background-color: orange;">
        </div>
       <!-- end -->
       
       @foreach($cat_wise_books as $book)
        <div class="col-md-3">

            <div class="product-wrapper  text-center">
                <input type="hidden" id="id" value="{{$book->id}}">
                <div class="product-img-1"> <a href="{{route('singleBook',$book->id)}}" data-abc="true"> <img src="{{asset('covers/'.$book->cover)}}" alt="" height="190" width="170"> </a>

                    
                </div>
                <div class="add-to-cart-div">
                  <a href="#" class="add-to-cart btn btn-warning buy-btn">
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
          {!! $cat_wise_books->links() !!}
</div>
@endsection