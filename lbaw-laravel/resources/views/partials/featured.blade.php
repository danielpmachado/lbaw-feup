<div class="card col-lg-3 col-md-4 col-sm-6">
    <div class="image-card" style="height:40vh; display:flex; align-items:center;">
        <img class="card-img-top" src="{{ URL::to('/') }}/images/products/{{$featuredProduct->product->pic}}" alt="Card image cap">
    </div>
   
    <div class="card-body">
        <h5 class="card-title" style="height:2em;">{{$featuredProduct->product->name}}</h5>
        <p class="card-text">{{$featuredProduct->product->price}}€ - 
            @if($featuredProduct->product->stock > 0)
            Available
            @else
            Sold Off
            @endif
        </p>
        <div class="card-btn">
            <a href="product.html" class="btn  btn-success btn-block">Add to Cart</a>
        <a href="{{route('page', ['id' =>$featuredProduct->product->id])}}" class="btn  btn-dark  btn-block">See More</a>
        </div>
    </div>
</div>

<?php 

