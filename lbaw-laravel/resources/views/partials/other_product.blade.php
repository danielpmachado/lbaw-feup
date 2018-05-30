<div class="card col-lg-2 col-md-3 col-sm-6 product-card">
    <div class="image-card" style="height:100%; width:100%; display:flex; align-items:center;">
        <img class="card-img-top" src="{{ URL::to('/') }}/images/products/{{$product->pic}}" alt="Card image cap">
    </div>

    <div class="card-body product" data-id="{{$product->id}}">
        <h5 class="card-title">{{$product->name}}</h5>
        <p class="card-text" style="height:-20px;">{{$product->price}}€ -
            @if($product->stock > 0)
            Available
            @else
            Sold Off
            @endif
        </p>
        <hr>
        <div class="card-btn">
             @if(Auth::check())
                    @if($product->ordered())
                        <button id="cart" type="button" class="btn btn-outline-success btn-block mb-2" disabled>
                            <i class="fa fa-check"></i> In Cart
                        </button>
                    @else
                        <button id="cart" type="button" class="btn btn-outline-success btn-block mb-2">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>
                    @endif
                @else
                    <button  type="button" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#buttons-modal">
                        <i class="fa fa-shopping-cart"></i> Add to Cart
                    </button>
                @endif
            <a href="{{route('page', ['id' =>$product->id])}}" class="btn btn-outline-dark btn-block">
                    See More <i class="fa fa-arrow-right-arrow-alt-circle-right"></i>
            </a>
        </div>
    </div>
</div>
