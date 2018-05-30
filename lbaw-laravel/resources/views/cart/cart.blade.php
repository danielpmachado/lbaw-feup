
<div role="tabpanel" class="tab-pane active" id="step-1">
    <div class="col-md-17">
        <div class="container">
            <div class="card shopping-cart">
                <div class="card-header bg-dark text-light ">
                    <p class="float-left mb-0" style="padding-top: 5px">Shopping cart</p>
                </div>
                <div class="card-body">

                    @each('cart.product',$products,'product')

                   
                    
                </div>
                <div class="card-footer">
                    <button id="step-1-next" class="btn btn-outline-dark float-right nextBtn">Checkout</button>
                    <div class=" pt-2">
                        Total price: <b class="price">{{$total}}</b> €
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
