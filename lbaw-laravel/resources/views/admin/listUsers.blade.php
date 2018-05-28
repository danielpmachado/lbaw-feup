@extends('layouts.app')

@section('content')

<div class="catalog container-fluid">
    <h2>Users</h2>
    <div class="row justify-content-center">
        <div class="col-lg-6" align="center">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-outline-dark" type="button">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </div>
    </div>
	<div class="row justify-content-center">
          
        @each('admin.userCard',$users, 'user')
     
	</div>
</div>

@endsection