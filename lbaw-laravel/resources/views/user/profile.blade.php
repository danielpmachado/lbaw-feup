@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="profile-sidebar">
					<div class="profile-user-pic-div text-center">
						<img class="profile-user-pic" src="/images/avatars/{{$user->avatar}}" alt="Profile picture">
					</div>
					<div class="profile-user-title text-center">
						<div class="profile-user-name">
							{{$user->username}}
						</div>
					</div>
					<div class="profile-user-menu">
						<ul class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
							<li class="active"><a data-toggle="pill" href="#overview"><i class="fa fa-user"></i> Personal Info</a></li>
							<li><a data-toggle="pill" href="#favorites"><i class="fa fa-heart"></i> Favorites</a></a></li>
							<li><a data-toggle="pill" href="#history"><i class="fa fa-history"></i> History </a></li>
							@if(Auth::id() == $user->id)
							<li><a data-toggle="pill" href="#settings"><i class="fa fa-cogs"></i> Settings </a></li>
							@endif
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
						<a> Email </a> <p>{{$user->email}} </p>
						<a> Address </a> <p>{{$user->address}}</p>
						<a> City </a> <p>{{$user->city}}</p>
						<a> Zip </a> <p>{{$user->zip}}</p>
						<a> Password</a> <p> ********** </p>
					</div>
				</div>
			</div>

			@include('user.favorites')
			@include('user.settings')
			@include('user.history')
		</div>
	</div>
</div>

@endsection
