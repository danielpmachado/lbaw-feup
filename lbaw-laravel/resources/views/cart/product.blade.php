<div class="product-order" data-id="{{ $product->id }}">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-2 text-center float-left">
            <img class="img-responsive" src="/images/products/{{$product->pic}}" alt="prewiew" width="120" height="80">
        </div>

        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-8">
            <a href="/products/{{ $product->id }}" class="product-name"><strong>{{$product->name}}</strong></a>
            <p>{{ $product->price }} €</p>
        </div>

        <div class="col-12 col-sm-12 col-md-2 float-right" >

            <button id="delete" type="button" class="btn btn-outline-danger float-right">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>

            <div class="quantity">
                <input id="quantity" type="button" value="+" class="plus">
                <input value="{{$product->pivot->quantity}}"  class="qty" size="4" disabled>
                <input id="quantity" type="button" value="-" class="minus">
            </div>

        </div>
    </div>
    <hr>
</div>

