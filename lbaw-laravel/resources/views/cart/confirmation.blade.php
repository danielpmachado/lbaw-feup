<div role="tabpanel" class="tab-pane" id="step-4">
    <div class="container-fluid" style="width:70%;">
        <div class="card fav-cart">
            <div class="card-header bg-dark text-light">Purchase Confirmation</div>
            <div class="card-body">
                <h5><strong>Products</strong></h5>

                @foreach($products as $product)
                <div class="product-conf" data-id="{{$product->id}}">
                    <h6><strong>Name:</strong> {{$product->name}}</h6>
                    <h6 class="qty"><strong>Quantity:</strong>  {{$product->pivot->quantity}}</h6>
                    <h6><strong>Price:</strong>  {{$product->price}} €</h6>
                    <br>
                </div>
                @endforeach
                <hr>

                <h5><strong>Expedition Info</strong></h5>
                <h6 id="address-conf"><strong>Address:</strong> Address</h6>
                <h6 id="contact-conf"><strong>Contact:</strong> Address</h6>
                <h6 id="payment-conf"><strong>Contact:</strong> Address</h6>
                <hr>

                <h6 id="total-conf" class="float-right" ><strong>Total:</strong> {{$total}} €</h6>

            </div>
            <div class="card-footer">
                <button id="confirmation"  type="submit" class="btn btn-outline-dark float-right">
                <i class="fas fa-check"></i> Confirm
                </button>
            </div>
        </div>
    </div>
</div>