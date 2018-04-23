@extends('layouts.app')

@section('content')

<div class="container profile">
	<div class="row">
		<div class="col-md-4">
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
					<li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-user"></i> Personal Info</a></li>
					<li><a data-toggle="pill" href="#menu1"><i class="fa fa-heart"></i> Favorites</a></a></li>
					<li><a data-toggle="pill" href="#menu2"><i class="fa fa-history"></i> History </a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="tab-content col-md-8">
			<div id="home" class="tab-pane fade show active">
				<div class="panel panel-default target">
					<div class="panel-heading" contenteditable="false">Personal Info</div>
						<div class="panel-body">
							<a> Username </a> <h5>{{$user->username}}</h5>
							<a> Address </a> <h5>{{$user->address}}</h5>
							<a> City </a> <h5>{{$user->city}}</h5>
							<a> Email </a> <h5>{{$user->email}} </h5>
							<a> Password</a> <h5> ********** </h5>
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
</div>
				
@endsection