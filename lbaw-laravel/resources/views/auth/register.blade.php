@extends('layouts.app')

@section('content')

<div class="sign container-fluid">
    <h4 class="p-2">Sign up</h4>
    <form form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
            <input placeholder="Username" id="name" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
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

        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            <input placeholder="Address" id="adress" type="text" class="form-control" name="address" value="{{ old('address') }}" required>
        </div>

        <div class="form-row">
            <div class="form-group col-md-8 {{ $errors->has('city') ? ' has-error' : '' }}">
                <input placeholder="City" id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required>
            </div>
            <div class="form-group col-md-4  {{ $errors->has('city') ? ' has-error' : '' }}">
            <input placeholder="Zip" id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required>
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
@endsection
