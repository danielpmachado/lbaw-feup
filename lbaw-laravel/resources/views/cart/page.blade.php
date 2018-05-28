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
                <div role="tabpanel" class="tab-pane active" id="step-1">
                    <div class="col-md-17">


                      <div class="container">
                         <div class="card shopping-cart">
                                  <div class="card-header bg-dark text-light">
                                      <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                      Shopping cart
                                      <a href="catalog.html" class="btn btn-outline-light btn-sm pull-right">Continue shopping</a>
                                      <div class="clearfix"></div>
                                  </div>
                                  <div class="card-body">

                                        @each('cart.product',$products,'product')
                                        

                                      <div class="pull-right">
                                          <a href="" class="btn btn-outline-secondary pull-right">
                                              Update shopping cart
                                          </a>
                                      </div>
                                  </div>
                                  <div class="card-footer">
                                      <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                                          <div class="row">
                                              <div class="col-6">
                                                  <input type="text" class="form-control" placeholder="coupon code">
                                              </div>
                                              <div class="col-6">
                                                  <input type="submit" class="btn btn-default" value="Use coupon">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="pull-right" style="margin: 10px">
                                          <button href="" id="step-1-next" class="btn btn-success pull-right">Checkout</button>
                                          <div class="pull-right" style="margin: 5px">
                                              Total price: <b>2289.99€</b>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                      </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="step-2">
                    <div class="col-md-12">
                        <button id="step-2-next" class="btn btn-lg btn-primary pull-right">Next</button>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="step-3">
                    <div class="col-md-12">
                        <button id="step-3-next" class="btn btn-lg btn-primary pull-right">Next</button>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="step-4">
                    <div class="col-md-12">
                        <button id="step-4-next" class="btn btn-lg btn-primary pull-right">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
