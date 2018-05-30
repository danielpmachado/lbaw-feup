@extends('layouts.app')

@section('content')

<div class="catalog container-fluid">
    <h2>Users</h2>
    <div class="row justify-content-center">
        <div class="col-lg-6" align="center">
            <div class="input-group">
                <form method="get" class="form-inline input-group" action="{{ route('searchUsers') }}">
                    <input class="form-control" type="search" name="search_content" placeholder="Search for user" aria-label="Search">
                    <div class="input-group-append">
                        <button class="input-group-text" type="submit"><i class="fa fa-search" ></i></button>
                    </div>
                </form>
            </div><!-- /.col-lg-6 -->
        </div>
    </div>
	<div class="row justify-content-center">

        @each('admin.userCard',$users, 'user')

    </div>
    
   
</div>
{{$users->links()}}
@endsection
