@extends('layouts.app')

@section('content')

<div class="sign container-fluid">
    <h4 class="p-2">Sign up</h4>
        <form form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                <input placeholder="Username" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                 <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input placeholder="Email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="inputAddress" placeholder="Address">
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <input type="text" class="form-control" id="inputCity" placeholder="City">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" id="inputZip" placeholder="Zip">
                </div>
            </div>
            <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2">
                        <label class="form-check-label" for="invalidCheck2">
                            Agree to terms and conditions
                        </label>
                    </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark ">Sign up</button>
            </div>
        </form>
    </div>
</div>
@endsection
