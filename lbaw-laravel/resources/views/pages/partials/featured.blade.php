<div class="card col-lg-3 col-md-4 col-sm-6">
    <img class="card-img-top" src="{{ URL::to('/') }}/images/products/{{$featuredProduct->product->pic}}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{$featuredProduct->product->name}}</h5>
        <p class="card-text">{{$featuredProduct->product->price}}€ - 
            @if($featuredProduct->product->stock > 0)
            Available
            @else
            Sold Off
            @endif
        </p>
        <div class="card-btn">
            <a href="product.html" class="btn  btn-success btn-block">Add to Cart</a>
        <a href="product.html" class="btn  btn-dark  btn-block">See More</a>
        </div>
    </div>
</div>

<?php 

