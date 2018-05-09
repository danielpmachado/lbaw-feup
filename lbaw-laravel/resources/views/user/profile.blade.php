@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<div class="profile-user-pic">
					<img src="images/default.png" alt="" class="img-fluid rounded">
				</div>
				<div class="profile-user-title">
					<div class="profile-user-name">
						{{$user->username}}
					</div>
				</div>
				<div class="profile-user-menu">
					<ul class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
					<li class="active"><a data-toggle="pill" href="#overview"><i class="fa fa-user"></i> Personal Info</a></li>
					<li><a data-toggle="pill" href="#favorites"><i class="fa fa-heart"></i> Favorites</a></a></li>
					<li><a data-toggle="pill" href="#history"><i class="fa fa-history"></i> History </a></li>
					<li><a data-toggle="pill" href="#settings"><i class="fa fa-cogs"></i> Settings </a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="profile-tabs tab-content col-md-9">
			<div id="overview" class="tab-pane fade show active">
				<div class="card fav-card">
             		<div class="card-header bg-dark text-light">Personal Info</div>
					<div class="card-body">
						<a> Username </a> <p>{{$user->username}}</p>
						<a> Address </a> <p>{{$user->address}}</p>
						<a> City </a> <p>{{$user->city}}</p>
						<a> Email </a> <p>{{$user->email}} </p>
						<a> Password</a> <p> ********** </p>
					</div>
				</div>
			</div>
			<div id="settings" class="tab-pane fade show">
				<div class="card fav-card">
             		<div class="card-header bg-dark text-light">Personal Info</div>
					<div class="card-body">
						<a href="{{route('edit_profile', ['id' => Auth::user()->id])}}" type="button" class="btn btn-outline-primary"><span class="glyphicon glyphicon-pencil"></span>  Edit Info</a>
						
						<form action="{{ route('delete_user', ['id' => Auth::user()->id]) }}" method="post">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<div class="form-group">
								<button type="submit" class="btn btn-danger">DELETE</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
				
@endsection