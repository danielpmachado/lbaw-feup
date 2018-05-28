<div class="row">
    <div class="col-12 col-sm-12 col-md-2 text-center">
    <img class="img-responsive" src="/images/products/{{$product->pic}}" alt="prewiew" width="120" height="80">
    </div>
    <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
    <h4 class="product-name"><strong>{{$product->name}}</strong></h4>
    </div>
    <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
        <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
            <h6><strong>{{$product->price}} <span class="text-muted">x</span></strong></h6>
        </div>
        <div class="col-4 col-sm-4 col-md-4">
            <div class="quantity">
                <input type="button" value="+" class="plus">
                <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                       size="4">
                <input type="button" value="-" class="minus">
            </div>
        </div>
        <div class="col-2 col-sm-2 col-md-2 text-right">
            <button type="button" class="btn btn-outline-danger btn-xs">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>
<hr>
