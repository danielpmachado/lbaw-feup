
<div class="card col-lg-3 col-md-3 col-sm-6 ">
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
        <div class="card-btn">
            <a href="product.html" class="btn  btn-success btn-block">Add to Cart</a>
        <a href="{{route('page', ['id' =>$product->id])}}" class="btn  btn-dark  btn-block">See More</a>
        </div>
    </div>
</div>
