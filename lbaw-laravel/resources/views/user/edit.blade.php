@extends('layouts.app')

@section('content')
<div class="sign container-fluid">
        <h4 class="p-2">Edit Profile</h4>
            <form form class="form-horizontal" method="POST" action="{{ route('update_user', ['id' => Auth::user()->id])}}">
                {{ csrf_field() }}
    
                <div class="form-group {">
                    <input  id="name" type="text" class="form-control" name="username" value="{{ $user->username  }}" required autofocus>
                </div>
    
                <div class="form-group">
                    <input  id="adress" type="text" class="form-control" name="address" value="{{ $user->address }}" required>
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-8 ">
                        <input  id="city" type="text" class="form-control" name="city" value="{{ $user->city }}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" id="inputZip" placeholder="Zip">
                    </div>
                </div>
    
                <div class="form-group">
                    <button type="submit" class="btn btn-dark ">Save Changes</button>
                </div>
            </form>
        </div>
</div>                
@endsection