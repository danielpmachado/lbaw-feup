<div class="row product-order"  data-id="{{ $product->id }}">
    <div class="col-12 col-sm-12 col-md-2 text-center float-left">
        <img class="img-responsive" src="/images/products/{{$product->pic}}" alt="prewiew" width="120" height="80">
    </div>

    <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-8">
        <a href="/products/{{ $product->id }}" class="product-name"><strong>{{$product->name}}</strong></a>
        <p>{{ $product->price }} €</p>
    </div>

    <div class="col-12 col-sm-12 text-sm-center col-md-2 float-right" >

        <button id="delete" type="button" class="btn btn-outline-danger">
            <i class="fa fa-trash" aria-hidden="true"></i>
        </button>

        <div class="quantity">
            <input type="button" value="+" class="plus">
            <input type="number" step="1" max="99" min="1" value="{{$product->pivot->quantity}}" title="Qty" class="qty" size="4">
            <input type="button" value="-" class="minus">
        </div>

    </div>
    

</div>
<hr>
