<div class="card col-lg-3 col-md-3 col-sm-6 ">
    <div class="image-card" style="height:100%; width:100%; display:flex; align-items:center;">
        <img class="card-img-top" src="{{ URL::to('/') }}/images/products/{{$featuredProduct->product->pic}}" alt="Card image cap">
    </div>

    <div class="card-body ">
        <h5 class="card-title">{{$featuredProduct->product->name}}</h5>
        <p class="card-text" style="height:-20px;">{{$featuredProduct->product->price}}€ -
            @if($featuredProduct->product->stock > 0)
            Available
            @else
            Sold Off
            @endif
        </p>
        <hr>
            <div class="card-btn product"  data-id="{{$featuredProduct->product->id}}">
                @if(Auth::check())
                    @if($featuredProduct->product->ordered())
                        <button id="cart" type="button" class="btn btn-outline-success" disabled>
                            <i class="fa fa-check"></i> In Cart
                        </button>
                    @else
                        <button id="cart" type="button" class="btn btn-outline-success">
                            <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>
                    @endif
                @else
                    <button  type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#buttons-modal">
                        <i class="fa fa-shopping-cart"></i> Add to Cart
                    </button>
                @endif
                <a href="{{route('page', ['id' =>$featuredProduct->product->id])}}" class="btn btn-outline-dark">
                    See More <i class="fa fa-arrow-right-arrow-alt-circle-right"></i>
                </a>
            </div>

    </div>
</div>

@include('modals.cart')
