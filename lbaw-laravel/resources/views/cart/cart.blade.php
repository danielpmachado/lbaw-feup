@extends('layouts.app')

@section('content')
<div id="progress-bar" class="container">
    <div class="row">
        <div class="board">
            <ul class="nav nav-tabs">
                <div class="liner"></div>
                <li rel-index="0" class="active">
                    <a href="#step-1" class="btn" aria-controls="step-1" role="tab" data-toggle="tab">
                        <span> 1  </span>
                        <a>  Cart </a>
                    </a>
                </li>
                <li rel-index="1">
                    <a href="#step-2" class="btn disabled" aria-controls="step-2" role="tab" data-toggle="tab">
                        <span> 2  </span>
                        <a> Expedition </a>

                    </a>
                </li>
                <li rel-index="2">
                    <a href="#step-3" class="btn disabled" aria-controls="step-3" role="tab" data-toggle="tab">
                        <span> 3 </span>
                        <a> Payment </a>
                    </a>
                </li>
                <li rel-index="3">
                    <a href="#step-4" class="btn disabled" aria-controls="step-4" role="tab" data-toggle="tab">
                        <span> 4</span>
                        <a> Confirmation</a>
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
                <div class="col-md-17">
                    <div class="container">
                        <div class="card shopping-cart">
                            <div class="card-header bg-dark text-light ">
                                <p class="float-left mb-0" style="padding-top: 5px">Shopping cart</p>
                                <a href="catalog.html" class="btn btn-outline-light float-right">Continue shopping</a>
                            </div>
                            <div class="card-body">

                                @each('cart.product',$products,'product')

                                <?php
                                   $total =0;

                                   foreach($products as $product)
                                       $total += $product->price * $product->pivot->quantity;

                                ?>
                                
                            </div>
                            <div class="card-footer">
                                <button href=""  class="btn btn-outline-dark float-right">Checkout</button>
                                <div class=" pt-2">
                                    Total price: <b class="price">{{$total}}</b> €
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
