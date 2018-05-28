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
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                  </div>
                </div>
          </li>
          @endif


           @if (!Auth::check())
        <li class="nav-item">
            <button type="button" class="btn btn-link nav-link" data-toggle="modal" data-target="#cartModal">
                <i class="fa fa-shopping-cart"></i> 0,00€
            </button>
        </li>
          @else
          <li class="nav-item">
              <a type="button" class="btn btn-link nav-link"  href="{{route('cart', ['id' =>Auth::user()->id])}}" >
                  <i class="fa fa-shopping-cart"></i> 0,00€
              </a>
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
