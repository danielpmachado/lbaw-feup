<div class="card col-lg-3 col-md-4 col-sm-6">
    <a href="user.html">
        <img class="card-img-top" src="/images/avatars/{{$user->avatar}}" alt="Card image cap">
    </a>
    <div class="card-body">
    <h5 class="card-title">{{$user->username}}</h5>
    <p class="card-text">{{$user->email}}</p>
        <div class="card-btn">
                <a href="product.html" class="btn  btn-warning  btn-block" data-toggle="modal" data-target="#blockModal">Block</a>
                <a href="product.html" class="btn  btn-danger  btn-block" data-toggle="modal" data-target="#banModal">Ban</a>
        </div>
    </div>
</div>