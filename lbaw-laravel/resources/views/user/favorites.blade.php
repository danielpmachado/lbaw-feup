<div id="favorites" class="tab-pane fade show">
    <div class="card fav-card">
        <div class="card-header bg-dark text-light">Favorites</div>
        <div class="card-body">
            @foreach($favorites as $favorite)
            <div class="row product" data-id="{{ $favorite->id }}">
                <div class="col-12 col-sm-12 col-md-2 text-center">
                    <img class="img-responsive" src="/images/products/{{$favorite->pic}}" alt="prewiew" width="120" height="80">
                </div>

                <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                    <a class="product-name" href="/products/{{ $favorite->id }}"><strong>{{ $favorite->name }}</strong></a>
                    <p>{{ $favorite->price }} €</p>
                </div>

                @if(Auth::id() == $user->id)
                <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right" >
                    <button type="button" class="btn btn-outline-success btn-xs">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart
                    </button>
                    <button id="fav" type="button" class="btn btn-outline-danger btn-xs" value="list_remove">
                        <i class="fa fa-trash" aria-hidden="true"></i> Remove
                    </button>
                </div>
                @endif
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>