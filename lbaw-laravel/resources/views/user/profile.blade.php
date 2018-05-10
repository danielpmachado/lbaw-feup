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
             		<div class="card-header bg-dark text-light">Settings</div>
					<div class="card-body">
						<form form class="form-horizontal" method="POST" action="{{ route('update_user', ['id' => Auth::user()->id])}}">
							{{ csrf_field() }}
				
							<div class="form-group">
								<a> Username </a>
								<input  id="name" type="text" class="form-control" name="username" value="{{ $user->username  }}" required autofocus>
							</div>
				
							<div class="form-group">
								<a> Address </a>
								<input  id="address" type="text" class="form-control" name="address" value="{{ $user->address }}" required>
							</div>
				
							<div class="form-row">
								<div class="form-group col-md-8 ">
									<a> City </a>
									<input  id="city" type="text" class="form-control" name="city" value="{{ $user->city }}" required>
								</div>
								<div class="form-group col-md-4">
									<a> Zip </a>
									<input type="text" class="form-control" id="inputZip" placeholder="Zip">
								</div>
							</div>

							<div class="form-group">
								<a> Password </a>
								<input  id="password" type="password" class="form-control" name="password" value="0123456789" required>
							</div>

							<div class="form-group">
								<a> Confirm Password </a>
								<input  id="confirm-password" type="password" class="form-control" name="confirm-password" value="0123456789" required>
							</div>
				
							<div class="form-group float-left">
								<button type="submit" class="btn btn-dark ">Save Changes</button>
							</div>

						</form>
						
						<form action="{{ route('delete_user', ['id' => Auth::user()->id]) }}" method="post">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
							<div class="form-group float-right">
								<button type="submit" class="btn btn-danger">Delete Account</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
				
@endsection