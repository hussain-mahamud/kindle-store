<div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <!-- Begin Header Bottom Menu Area -->
            <div class="hb-menu">
               <nav>
                  <ul>
                     <li><a href="{{route('home')}}">Home</a></li>
                     <li class="megamenu-holder hello">
                        <a href="shop-left-sidebar.html">Categories</a>
                        <ul class="megamenu hb-megamenu">
                           <li>
                              @foreach($categories as $category)
                              <a href="#">{{$category->cat_name}}</a>
                              @endforeach
                           </li>
                          
                        </ul>
                     </li>
                     <li><a href="contact.html">Contact</a></li>
                     
                     <li class="dropdown-holder float-right">
                        <a href="index.html">My Account</a>
                        <ul class="hb-dropdown">
                          @if(!Auth::user())
                           <li><a href="#">Login</a></li>
                           <li><a href="#">Sign UP</a></li>
                           @else
                           <li><a href="#">{{Auth::user()->name}}</a></li>
                           <li>
                               <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                           </li>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                           @endif
                        </ul>
                     </li>
                  </ul>
               </nav>
            </div>
            <!-- Header Bottom Menu Area End Here -->
         </div>
      </div>
   </div>
</div>