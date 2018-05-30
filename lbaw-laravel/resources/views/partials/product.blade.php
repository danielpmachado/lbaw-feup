@foreach($order->products as $product)
<div class="row product" data-id="{{ $product->id }}">
    <div class="col-12 col-sm-12 col-md-2 text-center">
        <img class="img-responsive" src="/images/products/{{$product->pic}}" alt="prewiew" width="120" height="80">
    </div>

    <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
        <a class="product-name" href="/products/{{ $product->id }}"><strong>{{ $product->name }}</strong></a>
        <p>{{ $product->price }} €</p>
    </div>

    <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right" >
        {{substr($order->payment_date,0,10)}}
    </div>

</div>
<hr>
@endforeach
