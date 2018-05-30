<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" id="main-nav">
    <a class="navbar-brand" href="/">{{ config('app.name', 'Tech4U') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar1">
        <form method="get" class="form-inline input-group" action="{{route('search')}}">
            <input class="form-control" type="search" name="search_content" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="input-group-text" type="submit" id="basic-addon2"><i class="fa fa-search" ></i></button>
            </div>
        </form>
        <ul class="navbar-nav ml-auto">

            @each('partials.category',App\Category::get(), 'category')



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

            @if(Auth::check())
            @if (Auth::user()->permissions == 'User')
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

            @if (Auth::user()->permissions == 'Admin')
            <li class="nav-item ">
                <div class="dropdown show ">
                    <a  id="nav_signIn" class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenuButton">
                        <i class="fa fa-user"></i> {{Auth::user()->username}}
                    </a>
                    <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item align-left" href="{{route('profile', ['id' =>Auth::user()->id])}}">Profile</a>
                        <a class="dropdown-item" href="{{ url('/admin/users') }}">Users</a>
                        <a class="dropdown-item" href="{{ url('/admin/addProduct') }}">Add Product</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                    </div>
                </div>
            </li>
            @endif
            @endif

            @if (!Auth::check())
            <li class="nav-item">
                <a id="nav_cart"   class="nav-link"  data-toggle="modal" data-target="#cartModal">
                    <i class="fa fa-shopping-cart"></i> 0,00€
                </a>
            </li>

            @else

            <?php
            $products = Auth::user()->cart;
            $total =0;

            foreach($products as $product)
            $total += $product->price * $product->pivot->quantity;

            ?>
            <li class="nav-item">
                <a id="nav_cart" class="nav-link"  href="{{route('cart', ['id' =>Auth::user()->id])}}" >
                    <i class="fa fa-shopping-cart"></i>{{number_format($total, 2)}} €
                </a>
            </li>

            @endif
            <li class="nav-item">
                <a id="help-link" class="nav-link" data-toggle="modal" data-target="#helpModal">
                    <i class="fas fa-question fa-sm"></i>
                </a>
            </li>

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

<div class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="modal-cart">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Online Help</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="help-spotlight">Welcome to Tech4U!</p>
                <p>
                    Only logged users have access to all functionalities of this website. Although not logged in,
                    you can search for products by using our search bar or searching for category.
                </p>
                <hr />
                <p class="help-spotlight">Sign In</p>
                <p>
                    You have a quick access to login form through the navigation bar on <span class="category">Sign In</span>.
                    If you don't have a account yet, you can easily do it following the same path but chosing
                    <span class="category">New here? Sign up</span> instead.
                </p>
                <hr />
                <p class="help-spotlight">Add a product to cart</p>
                <p>
                    You have the option <span class="category"><i class="fa fa-shopping-cart"></i> Add to Cart</span> from the page of
                    the product or directly from the catalog or search results.
                </p>
                <hr />
                <p class="help-spotlight">Add a product to Wishlist</p>
                <p>
                    You have the option <span class="category"><i class="fa fa-heart"></i> Add to Wishlist</span> from the page of
                    the product.
                </p>
                <hr />
                <p class="help-spotlight">Finalize a purchase</p>
                <p>
                    You just have to press to <span class="category"><i class="fa fa-shopping-cart"></i></span> at the right of navigation bar
                    and follow the steps.
                </p>
                <hr />
                <p class="help-spotlight">Edit Profile</p>
                <p>
                    Click at your name on the navigation bar and choose <span class="category">Profile</span>. At your
                    profile page, choose <span class="category"><i class="fa fa-cogs"></i> Settings</span>. There you
                    can change your name, address, etc.
                </p>
                <hr />
                <p class="help-spotlight">Delete account</p>
                <p>
                    Follow the same steps for edit your profile. At the page for edit your profile, you will have thead
                    option <span class="category">Delete Account</span>. Atention: this action is irreversible.
                </p>
            </div>
            <div class="modal-footer" id="cart-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">I understood</button>
            </div>
        </div>
    </div>
</div>
