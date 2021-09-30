<!DOCTYPE html>
<html class="no-js" lang="zxx">
   <!-- index28:48-->
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="x-ua-compatible" content="ie=edge" />
      <title>Kindle Store</title>
      <meta name="description" content="" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/images/menu/logo1.png')}}" />
      <!-- Material Design Iconic Font-V2.2.0 -->
      <link rel="stylesheet" href="{{asset('frontend/css/material-design-iconic-font.min.css')}}" />
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}" />
      <!-- Font Awesome Stars-->
      <link rel="stylesheet" href="{{asset('frontend/css/fontawesome-stars.css')}}" />
      <!-- Meanmenu CSS -->
      <link rel="stylesheet" href="{{asset('frontend/css/meanmenu.css')}}" />
      <!-- owl carousel CSS -->
      <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}" />
      <!-- Slick Carousel CSS -->
      <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}" />
      <!-- Animate CSS -->
      <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}" />
      <!-- Jquery-ui CSS -->
      <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.min.css')}}" />
      <!-- Venobox CSS -->
      <link rel="stylesheet" href="{{asset('frontend/css/venobox.css')}}" />
      <!-- Nice Select CSS -->
      <link rel="stylesheet" href="{{asset('frontend/css/nice-select.css')}}" />
      <!-- Magnific Popup CSS -->
      <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}" />
      <!-- Bootstrap V4.1.3 Fremwork CSS -->
      <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" />
      <!-- Helper CSS -->
      <link rel="stylesheet" href="{{asset('frontend/css/helper.css')}}" />
      <!-- Main Style CSS -->
      <link rel="stylesheet" href="{{asset('frontend/style.css')}}" />
      <link rel="stylesheet" href="{{asset('product.css')}}" />
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}" />
      <!-- Modernizr js -->
      <script src="{{asset('frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
 <!-- alertify cdn -->
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
   </head>
   <body>
      <!--[if lt IE 8]>
         <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->
      <!-- Begin Body Wrapper -->
      <div class="body-wrapper">
         <!-- Begin Header Area -->
         <header>
            <!-- Begin Header Top Area -->
            
            <!-- Header Top Area End Here -->
            <!-- Begin Header Middle Area -->
            <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
               <div class="container">
                  <div class="row">
                     <!-- Begin Header Logo Area -->
                     <div class="col-lg-3">
                        <div class="logo pb-sm-30 pb-xs-30">
                           <a href="{{route('home')}}">
                              <img src="{{asset('frontend/images/logo1.png')}}" alt="" id="logo" />
                           </a>
                        </div>
                     </div>
                     <!-- Header Logo Area End Here -->
                     <!-- Begin Header Middle Right Area -->
                     <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                        <!-- Begin Header Middle Searchbox Area -->
                        <form action="#" class="hm-searchbox">
                           <select class="nice-select select-search-category">
                              <option value="0">All</option>
                              @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->cat_name}}</option>
                              @endforeach
                           </select>
                           <input type="text" placeholder="Enter your search key ..." />
                           <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                        <!-- Header Middle Searchbox Area End Here -->
                        <!-- Begin Header Middle Right Area -->
                        <div class="header-middle-right">
                           <ul class="hm-menu">
                              <!-- Begin Header Middle Wishlist Area -->
                              <li class="hm-wishlist">
                                 <a href="wishlist.html">
                                    <span class="cart-item-count wishlist-item-count">0</span>
                                    <i class="fa fa-heart-o"></i>
                                 </a>
                              </li>
                              <!-- Header Middle Wishlist Area End Here -->
                              <!-- Begin Header Mini Cart Area -->
                              <li class="hm-minicart">
                                 <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    
                                    <span class="item-text subtotal-field">
                                       <span class="sub_total_amount">${{Cart::subtotal()}}</span>
                                       <span class="cart-item-count countItem" id="voda">{{Cart::count()}}</span>
                                    </span>
                                    
                                 </div>
                                 <span></span>
                                 <div class="minicart">
                                 
                                    <?php $contents=Cart::content(); ?>
                                    
                                    <ul class="minicart-product-list">
                                       @foreach($contents as $content)
                                       <li>
                                          <a href="{{route('singleBook',$content->id)}}" class="minicart-product-image">
                                             <img src="{{asset('covers/'.$content->options->img)}}" alt="cart products" />
                                          </a>
                                          <div class="minicart-product-details">
                                             <h6><a href="{{route('singleBook',$content->id)}}">{{$content->name}}</a></h6>
                                             <span>${{$content->price}} x {{$content->qty}}</span>
                                          </div>
                                          <button class="close" title="Remove">
                                             <i class="fa fa-close"></i>
                                          </button>
                                       </li>
                                       @endforeach
                                       
                                    </ul>
                                    <p class="minicart-total">SUBTOTAL: <span class="cart-bottom-sub">${{Cart::subtotal()}}</span></p>
                                    <div class="minicart-button">
                                       <a href="{{route('cart')}}" class="li-button li-button-fullwidth li-button-dark">
                                          <span>View Full Cart</span>
                                       </a>
                                       
                                       <a href="checkout.html" class="li-button li-button-fullwidth">
                                          <span>Checkout</span>
                                       </a>
                                       
                                    </div>
                                    
                                 </div>
                              </li>
                              <!-- Header Mini Cart Area End Here -->
                           </ul>
                        </div>
                        <!-- Header Middle Right Area End Here -->
                     </div>
                     <!-- Header Middle Right Area End Here -->
                  </div>
               </div>
            </div>
            <!-- Header Middle Area End Here -->
            <!-- Begin Header Bottom Area -->
            @include('layout.frontend-menu')
            <!-- Header Bottom Area End Here -->
            <!-- Begin Mobile Menu Area -->
            <div class="mobile-menu-area d-lg-none d-xl-none col-12">
               <div class="container">
                  <div class="row">
                     <div class="mobile-menu"></div>
                  </div>
               </div>
            </div>
            <!-- Mobile Menu Area End Here -->
         </header>
         <!-- Header Area End Here -->
         <!-- Begin Slider With Banner Area -->
        
         <!-- Slider With Banner Area End Here -->
         
            @yield('content')
    
         <!-- Begin Product Area -->
        
         <!-- Product Area End Here -->

         <!-- Begin Footer Area -->
         @include('layout.footer')
         <!-- Quick View | Modal Area End Here -->
      </div>
      <!-- Body Wrapper End Here -->
      <!-- jQuery-V1.12.4 -->
      <script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
      <!-- Popper js -->
      <script src="{{asset('frontend/js/vendor/popper.min.js')}}"></script>
      <!-- Bootstrap V4.1.3 Fremwork js -->
      <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
      <!-- Ajax Mail js -->
      <script src="{{asset('frontend/js/ajax-mail.js')}}"></script>
      <!-- Meanmenu js -->
      <script src="{{asset('frontend/js/jquery.meanmenu.min.js')}}"></script>
      <!-- Wow.min js -->
      <script src="{{asset('frontend/js/wow.min.js')}}"></script>
      <!-- Slick Carousel js -->
      <script src="{{asset('frontend/js/slick.min.js')}}"></script>
      <!-- Owl Carousel-2 js -->
      <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
      <!-- Magnific popup js -->
      <script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
      <!-- Isotope js -->
      <script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
      <!-- Imagesloaded js -->
      <script src="{{asset('frontend/js/imagesloaded.pkgd.min.js')}}"></script>
      <!-- Mixitup js -->
      <script src="{{asset('frontend/js/jquery.mixitup.min.js')}}"></script>
      <!-- Countdown -->
      <script src="{{asset('frontend/js/jquery.countdown.min.js')}}"></script>
      <!-- Counterup -->
      <script src="{{asset('frontend/js/jquery.counterup.min.js')}}"></script>
      <!-- Waypoints -->
      <script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
      <!-- Barrating -->
      <script src="{{asset('frontend/js/jquery.barrating.min.js')}}"></script>
      <!-- Jquery-ui -->
      <script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
      <!-- Venobox -->
      <script src="{{asset('frontend/js/venobox.min.js')}}"></script>
      <!-- Nice Select js -->
      <script src="{{asset('frontend/js/jquery.nice-select.min.js')}}"></script>
      <!-- ScrollUp js -->
      <script src="{{asset('frontend/js/scrollUp.min.js')}}"></script>
      <!-- Main/Activator js -->
      <script src="{{asset('frontend/js/main.js')}}"></script>
     <!--  own js code -->
     <script src="{{asset('frontend/js/cart.js')}}"></script>
     <script src="{{asset('js/custom.js')}}"></script>
   </body>
   <!-- index30:23-->
</html>
