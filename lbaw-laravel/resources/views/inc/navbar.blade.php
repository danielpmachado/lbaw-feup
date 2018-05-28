<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" id="main-nav">
        <a class="navbar-brand" href="/">{{ config('app.name', 'Tech4U') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbar1">
          <form class="form-inline input-group">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
            </div>
          </form>
          <ul class="navbar-nav ml-auto">

            <li id="" class="dropdown mega-dropdown show">
              <a href="#" class="" data-toggle="dropdown">Computers </a>
              <ul  class="dropdown-menu mega-dropdown-menu show">
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Desktops</h3>
                    <li><a href="#">Tech4U Gaming</a></li>
                                  <li><a href="#">Tech4U Workstation</a></li>
                                  <li><a href="#">Gaming</a></li>
                    <li><a href="#">Workstation</a></li>
                    <li class="divider"></li>
                    <h3 class="dropdown-header">Fonts</h3>
                                  <li><a href="#">Glyphicon</a></li>
                    <li><a href="#">Google Fonts</a></li>
                  </ul>
                </li>
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Laptops</h3>
                    <li><a href="#">Xiaomi Laptop </a></li>
                    <li><a href="#">MSI Laptop </a></li>
                    <li><a href="#">Gaming Laptop</a></li>
                    <li><a href="#">Lenovo Laptop</a></li>
                    <li><a href="#">ASUS Laptop</a></li>
                    <li><a href="#">HUAWEI Laptop</a></li>
                    <li><a href="#">Acer Laptop </a></li>
                  </ul>
                </li>
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Tablet PCs</h3>
                    <li><a href="#">Android Tablet</a></li>
                    <li><a href="#">Windows Tablet</a></li>
                    <li><a href="#">2 In 1 Tablet</a></li>
                    <li><a href="#">Phablet</a></li>
                    <li><a href="#">Kids Tablet </a></li>
                    <li><a href="#">Gaming Tablet</a></li>
                  </ul>
                </li>
                <li class="col-sm-3 nav-column " id="image">
                  <ul>
                  <li class="dropdown-header">Featured</li>
                          <div id="menCollection" class="carousel slide" data-ride="carousel"> <!-- Change to img only-->
                            <div class="carousel-inner">
                              <div class="item active">
                                  <a href="#"><img src="{{ URL::to('/') }}/images/home1.jpg" height="200em" width="300em"class="img-responsive rounded" alt="product 1"></a>
                                 <button style="margin-top:7px" href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                            </div><!-- End Item -->
                         </div><!-- End Carousel Inner -->
                      </div><!-- /.carousel -->
                   <li class="divider"></li>
  
                </ul>
                </li>
              </ul>
            </li>
  
            <li id="" class="dropdown mega-dropdown show">
              <a href="#" class="" data-toggle="dropdown">Accessories </a>
              <ul  class="dropdown-menu mega-dropdown-menu show">
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Desktops</h3>
                    <li><a href="#">Tech4U Gaming</a></li>
                                  <li><a href="#">Tech4U Workstation</a></li>
                                  <li><a href="#">Gaming</a></li>
                    <li><a href="#">Workstation</a></li>
                    <li class="divider"></li>
                    <h3 class="dropdown-header">Fonts</h3>
                                  <li><a href="#">Glyphicon</a></li>
                    <li><a href="#">Google Fonts</a></li>
                  </ul>
                </li>
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Laptops</h3>
                    <li><a href="#">Xiaomi Laptop </a></li>
                    <li><a href="#">MSI Laptop </a></li>
                    <li><a href="#">Gaming Laptop</a></li>
                    <li><a href="#">Lenovo Laptop</a></li>
                    <li><a href="#">ASUS Laptop</a></li>
                    <li><a href="#">HUAWEI Laptop</a></li>
                    <li><a href="#">Acer Laptop </a></li>
                  </ul>
                </li>
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Tablet PCs</h3>
                    <li><a href="#">Android Tablet</a></li>
                    <li><a href="#">Windows Tablet</a></li>
                    <li><a href="#">2 In 1 Tablet</a></li>
                    <li><a href="#">Phablet</a></li>
                    <li><a href="#">Kids Tablet </a></li>
                    <li><a href="#">Gaming Tablet</a></li>
                  </ul>
                </li>
                <li class="col-sm-3 nav-column " id="image">
                  <ul>
                  <li class="dropdown-header">Featured</li>
                          <div id="menCollection" class="carousel slide" data-ride="carousel"> <!-- Change to img only-->
                            <div class="carousel-inner">
                              <div class="item active">
                                  <a href="#"><img src="{{ URL::to('/') }}/images/products/MacBook.png" height="200em" width="300em"class="img-responsive rounded" alt="product 1"></a>
                                 <button style="margin-top:7px" href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                            </div><!-- End Item -->
                         </div><!-- End Carousel Inner -->
                      </div><!-- /.carousel -->
                   <li class="divider"></li>
  
                </ul>
                </li>
              </ul>
            </li>
  
            <li id="" class="dropdown mega-dropdown show">
              <a href="#" class="" data-toggle="dropdown">Components </a>
              <ul  class="dropdown-menu mega-dropdown-menu show">
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Desktops</h3>
                    <li><a href="#">Tech4U Gaming</a></li>
                                  <li><a href="#">Tech4U Workstation</a></li>
                                  <li><a href="#">Gaming</a></li>
                    <li><a href="#">Workstation</a></li>
                    <li class="divider"></li>
                    <h3 class="dropdown-header">Fonts</h3>
                                  <li><a href="#">Glyphicon</a></li>
                    <li><a href="#">Google Fonts</a></li>
                  </ul>
                </li>
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Laptops</h3>
                    <li><a href="#">Xiaomi Laptop </a></li>
                    <li><a href="#">MSI Laptop </a></li>
                    <li><a href="#">Gaming Laptop</a></li>
                    <li><a href="#">Lenovo Laptop</a></li>
                    <li><a href="#">ASUS Laptop</a></li>
                    <li><a href="#">HUAWEI Laptop</a></li>
                    <li><a href="#">Acer Laptop </a></li>
                  </ul>
                </li>
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Tablet PCs</h3>
                    <li><a href="#">Android Tablet</a></li>
                    <li><a href="#">Windows Tablet</a></li>
                    <li><a href="#">2 In 1 Tablet</a></li>
                    <li><a href="#">Phablet</a></li>
                    <li><a href="#">Kids Tablet </a></li>
                    <li><a href="#">Gaming Tablet</a></li>
                  </ul>
                </li>
                <li class="col-sm-3 nav-column " id="image">
                  <ul>
                  <li class="dropdown-header">Featured</li>
                          <div id="menCollection" class="carousel slide" data-ride="carousel"> <!-- Change to img only-->
                            <div class="carousel-inner">
                              <div class="item active">
                                  <a href="#"><img src="{{ URL::to('/') }}/images/IphoneX.png" height="200em" width="300em"class="img-responsive rounded" alt="product 1"></a>
                                 <button style="margin-top:7px" href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                            </div><!-- End Item -->
                         </div><!-- End Carousel Inner -->
                      </div><!-- /.carousel -->
                   <li class="divider"></li>
  
                </ul>
                </li>
              </ul>
            </li>
  
            <li id="" class="dropdown mega-dropdown show">
              <a href="#" class="" data-toggle="dropdown">Consoles </a>
              <ul  class="dropdown-menu mega-dropdown-menu show">
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Desktops</h3>
                    <li><a href="#">Tech4U Gaming</a></li>
                                  <li><a href="#">Tech4U Workstation</a></li>
                                  <li><a href="#">Gaming</a></li>
                    <li><a href="#">Workstation</a></li>
                    <li class="divider"></li>
                    <h3 class="dropdown-header">Fonts</h3>
                                  <li><a href="#">Glyphicon</a></li>
                    <li><a href="#">Google Fonts</a></li>
                  </ul>
                </li>
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Laptops</h3>
                    <li><a href="#">Xiaomi Laptop </a></li>
                    <li><a href="#">MSI Laptop </a></li>
                    <li><a href="#">Gaming Laptop</a></li>
                    <li><a href="#">Lenovo Laptop</a></li>
                    <li><a href="#">ASUS Laptop</a></li>
                    <li><a href="#">HUAWEI Laptop</a></li>
                    <li><a href="#">Acer Laptop </a></li>
                  </ul>
                </li>
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Tablet PCs</h3>
                    <li><a href="#">Android Tablet</a></li>
                    <li><a href="#">Windows Tablet</a></li>
                    <li><a href="#">2 In 1 Tablet</a></li>
                    <li><a href="#">Phablet</a></li>
                    <li><a href="#">Kids Tablet </a></li>
                    <li><a href="#">Gaming Tablet</a></li>
                  </ul>
                </li>
                <li class="col-sm-3 nav-column " id="image">
                  <ul>
                  <li class="dropdown-header">Featured</li>
                          <div id="menCollection" class="carousel slide" data-ride="carousel"> <!-- Change to img only-->
                            <div class="carousel-inner">
                              <div class="item active">
                                  <a href="#"><img src="{{ URL::to('/') }}/images/zenbook.jpg" height="200em" width="300em"class="img-responsive rounded" alt="product 1"></a>
                                 <button style="margin-top:7px" href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                            </div><!-- End Item -->
                         </div><!-- End Carousel Inner -->
                      </div><!-- /.carousel -->
                   <li class="divider"></li>
  
                </ul>
                </li>
              </ul>
            </li>
  
            <li id="" class="dropdown mega-dropdown show">
              <a href="#" class="" data-toggle="dropdown">Mobile </a>
              <ul  class="dropdown-menu mega-dropdown-menu show">
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Desktops</h3>
                    <li><a href="#">Tech4U Gaming</a></li>
                                  <li><a href="#">Tech4U Workstation</a></li>
                                  <li><a href="#">Gaming</a></li>
                    <li><a href="#">Workstation</a></li>
                    <li class="divider"></li>
                    <h3 class="dropdown-header">Fonts</h3>
                                  <li><a href="#">Glyphicon</a></li>
                    <li><a href="#">Google Fonts</a></li>
                  </ul>
                </li>
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Laptops</h3>
                    <li><a href="#">Xiaomi Laptop </a></li>
                    <li><a href="#">MSI Laptop </a></li>
                    <li><a href="#">Gaming Laptop</a></li>
                    <li><a href="#">Lenovo Laptop</a></li>
                    <li><a href="#">ASUS Laptop</a></li>
                    <li><a href="#">HUAWEI Laptop</a></li>
                    <li><a href="#">Acer Laptop </a></li>
                  </ul>
                </li>
                <li class="col-6 col-sm-4 col-md-3 nav-column">
                  <ul>
                    <h3 class="dropdown-header ">Tablet PCs</h3>
                    <li><a href="#">Android Tablet</a></li>
                    <li><a href="#">Windows Tablet</a></li>
                    <li><a href="#">2 In 1 Tablet</a></li>
                    <li><a href="#">Phablet</a></li>
                    <li><a href="#">Kids Tablet </a></li>
                    <li><a href="#">Gaming Tablet</a></li>
                  </ul>
                </li>
                <li class="col-sm-3 nav-column " id="image">
                  <ul>
                  <li class="dropdown-header">Featured</li>
                          <div id="menCollection" class="carousel slide" data-ride="carousel"> <!-- Change to img only-->
                            <div class="carousel-inner">
                              <div class="item active">
                                  <a href="#"><img src="{{ URL::to('/') }}/images/asus2.jpg" height="200em" width="300em"class="img-responsive rounded" alt="product 1"></a>
                                 <button style="margin-top:7px" href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                            </div><!-- End Item -->
                         </div><!-- End Carousel Inner -->
                      </div><!-- /.carousel -->
                   <li class="divider"></li>
  
                </ul>
                </li>
              </ul>
            </li>
  
  
  
         <!--   <li class="nav-item ">
                <div class="dropdown show ">
                    <a id="nav_signIn" class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-user"></i>Sign in
                    </a>
                    <div class="dropdown-menu " id="sign-in">
                       <form class="my-3 mx-3 p-0 p-0">
                          <div class="form-group">
                            <input type="email" class="form-control" id="sign-in-usr" placeholder="Username">
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" id="sign-in-pw" placeholder="Password">
                          </div>
                          <div class="form-group">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                  Remember Me
                                </label>
                              </div>
                          </div>
                          <div class="form-group">
                             <button type="submit" class="btn btn-dark">Sign in</button>
                          </div>
                          <div class="g-signin2" data-width="180" data-height="40" data-longtitle="true"></div>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a  href="register.html">New here? Sign up</a><br>
                        <a  href="#">Forgot your password?</a>
                    </div>
                  </div>
            </li>
            <li class="nav-item">
              <a  id="nav_cart" class="nav-link" href="mycart.html"><i class="fa fa-shopping-cart"></i>0,00€</a>
            </li> -->

      

     <li class="nav-item ">
              @if (!Auth::check())
              <div class="dropdown show">
                  <a id="nav_signIn" class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>Sign in
                  </a>
                  <div class="dropdown-menu " id="sign-in">
  
                     <form class="my-3 mx-3 p-0 p-0" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
  
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="sign-in-usr" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
  
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
  
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <input id="sign-in-pw" type="password" class="form-control" name="password" required placeholder="Password">
  
                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                        </div>
  
                        <div class="form-group">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="gridCheck1">
                              <label class="form-check-label" for="gridCheck1">
                                Remember Me
                              </label>
                            </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-dark">Sign in</button>
                        </div>
                  
                       <a id="loginGoogle" href="{{url('auth/google')}}" class="btn btn-primary"><img src="/images/google-icon.png" width="20px"> Sign in with Google</a>
                      </form>
  
                      <div class="dropdown-divider"></div>
                      <a  href="{{ route('register') }}">New here? Sign up</a><br>
                      <a  href="{{ url('password/reset') }}">Forgot your password?</a>
                  </div>
              </div>
              @endif
          </li>
  
          @if (Auth::check())
          <li class="nav-item ">
              <div class="dropdown show ">
                  <a  id="nav_signIn" class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenuButton">
                    <i class="fa fa-user"></i> {{Auth::user()->username}}
                  </a>
                  <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item align-left" href="{{route('profile', ['id' =>Auth::user()->id])}}">Profile</a>
                      <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a> 
                  </div>
                </div>
          </li>
          
          @endif
  
          @if (Auth::check())
          <li class="nav-item">
              <a  id="nav_cart" class="nav-link" href="{{route('cart', ['id' =>Auth::user()->id])}}"><i class="fa fa-shopping-cart"></i>0,00€</a>
          </li>
          @endif
          @if (!Auth::check())
          <li  class="nav-item">
              
                  <button   id="button_cart" type="button" class="btn " data-toggle="modal" data-target="#cartModal">
                      <i class="fa fa-shopping-cart"></i> 0,00€
                  </button>     
          </li>
          @endif
        </ul>
  
    </div>
</nav>


<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="modal-cart">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Cart Access Denied</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            You need to Sign In in order to access to the Cart section. <br>
            If you don't have an account you should register yourself.
        </div>
        <div class="modal-footer" id="cart-footer">
            <form action="{{ route('register') }}">
              {{ csrf_field() }}
              {{ method_field('GET') }}
              <button class="btn btn-dark" type="submit" style="padding-right=5em; padding-left=5em;"> Sign Up </button>
              </form>
            <button type="button" class="btn btn-success" data-dismiss="modal" style="padding-right=5em; padding-left=5em;"> OK </button>
        </div>
    </div>
    </div>
</div>


