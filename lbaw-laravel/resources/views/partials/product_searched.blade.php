
<div class="card col-lg-2 col-md-3 col-sm-6 product-card">
    <div class="image-card" style="height:100%; width:100%; display:flex; align-items:center;">
        <img class="card-img-top" src="{{ URL::to('/') }}/images/products/{{$product->pic}}" alt="Card image cap">
    </div>

    <div class="card-body ">
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
           <!-- <a href="product.html" class="btn  btn-success btn-block">Add to Cart</a>
        <a href="{{route('page', ['id' =>$product->id])}}" class="btn  btn-dark  btn-block">See More</a>-->

            <button id="cart" type="button" class="btn btn-outline-success btn-block">
                <i class="fa fa-shopping-cart"></i> Add to Cart
            </button>
            <a href="{{route('page', ['id' =>$product->id])}}" class="btn btn-outline-dark btn-block">
                    See More <i class="fa fa-arrow-right-arrow-alt-circle-right"></i>
            </a>
        </div>
    </div>
</div>


