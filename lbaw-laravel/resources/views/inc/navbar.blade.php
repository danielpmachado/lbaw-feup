
<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark" id="main-nav">

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
        <li class="nav-item ">
            @if (!Auth::check())
            <div class="dropdown show">
                <a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      <div class="g-signin2" data-width="180" data-height="40" data-longtitle="true"></div>
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
                <a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenuButton">
                  <i class="fa fa-user"></i> {{Auth::user()->username}}
                </a>
                <div class="dropdown-menu " id="sign-in" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('profile', ['id' =>Auth::user()->id])}}">My Profile</a>
                <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a> 
                </div>
              </div>
        </li>
        
        @endif

        <li class="nav-item">
            <a class="nav-link" href="mycart.html"><i class="fa fa-shopping-cart"></i>0,00€</a>
          </li>

      </ul>
   </div>
</nav>
