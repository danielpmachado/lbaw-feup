@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
				<div class="col-md-4">
						<div class="profile-sidebar">
							<div class="profile-user-pic">
								<img src="images/default.png" alt="" class="img-fluid rounded">
							</div>
							<div class="profile-user-title">
								<div class="profile-user-name">
									Daniel Machado
								</div>
							</div>
							<div class="profile-user-menu">
									<ul class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
											<li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-user"></i> Personal Info</a></li>
											<li><a data-toggle="pill" href="#menu1"><i class="fa fa-heart"></i> Favorites</a></a></li>
											<li><a data-toggle="pill" href="#menu2"><i class="fa fa-history"></i> History </a></li>

										</ul>
							</div>
						</div>
		</div>
			<div class="tab-content col-md-8">
				<div id="home" class="tab-pane fade show active">
								<div class="panel panel-default target">
										<div class="panel-heading" contenteditable="false">Personal Info</div>
													<div class="panel-body">
															<a> Username </a> <h5>dolfander</h5>
															<a> Address </a> <h5>Curwen Rd, Workington CA14</h5>
															<a> City </a> <h5>London</h5>
															<a> Email </a> <h5> daniel.pmachado@gmail.com </h5>
															<a> Password</a> <h5> ********** </h5>
															<button type="button" class="btn btn-outline-primary"><span class="glyphicon glyphicon-pencil"></span>  Edit Info</button>
												</div>
										</div>
								</div>
				<div id="menu1" class="tab-pane fade">
						<div class="card fav-card">
								<div class="card-header bg-dark text-light">
										Favorites
								</div>
								<div class="card-body">
												<!-- PRODUCT -->
												<div class="row">
														<div class="col-12 col-sm-12 col-md-2 text-center">
																		<img class="img-responsive" src="images/product1.jpg" alt="prewiew" width="120" height="80">
														</div>
														<div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
																<h4 class="product-name"><strong>MacBook Pro</strong></h4>
																<h4>
																		<small>1123€</small>
																</h4>
														</div>
														<div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right ">
																<button type="button" class="btn btn-outline-success btn-xs">
																			<i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart
																</button>
																<button type="button" class="btn btn-outline-danger btn-xs">
																			<i class="fa fa-trash" aria-hidden="true"></i> Remove
																</button>
															</div>
													</div>
												<hr>
												<!-- END PRODUCT -->
												<!-- PRODUCT -->
												<div class="row">
														<div class="col-12 col-sm-12 col-md-2 text-center">
																		<img class="img-responsive" src="images/product1.jpg" alt="prewiew" width="120" height="80">
														</div>
														<div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
																<h4 class="product-name"><strong>MacBook Pro</strong></h4>
																<h4>
																		<small>1123€</small>
																</h4>
														</div>
														<div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right ">
															<button type="button" class="btn btn-outline-success btn-xs">
																		<i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart
															</button>
															<button type="button" class="btn btn-outline-danger btn-xs">
																		<i class="fa fa-trash" aria-hidden="true"></i> Remove
															</button>
														</div>
													</div>
												<hr>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-2 text-center">
                                    <img class="img-responsive" src="images/product1.jpg" alt="prewiew" width="120" height="80">
                            </div>
                            <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                <h4 class="product-name"><strong>MacBook Pro</strong></h4>
                                <h4>
                                    <small>1123€</small>
                                </h4>
                            </div>
                            <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right ">
                              <button type="button" class="btn btn-outline-success btn-xs">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart
                              </button>
                              <button type="button" class="btn btn-outline-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Remove
                              </button>
                            </div>
                          </div>
                        <hr>
									</div>
							</div>
					</div>
				<div id="menu2" class="tab-pane fade">
						<div class="card fav-card">
								<div class="card-header bg-dark text-light">
										Purchase History
								</div>
								<div class="card-body">
												<!-- PRODUCT -->
												<div class="row">
														<div class="col-12 col-sm-12 col-md-2 text-center">
																		<img class="img-responsive" src="images/product1.jpg" alt="prewiew" width="120" height="80">
														</div>
														<div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
																<h4 class="product-name"><strong>MacBook Pro</strong></h4>
																<h4>
																		<small>1123€</small>
																</h4>
														</div>
														<div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right ">
															<p>15/4/2016</p>
														</div>
													</div>
												<hr>
												<!-- END PRODUCT -->
												<!-- PRODUCT -->
												<div class="row">
														<div class="col-12 col-sm-12 col-md-2 text-center">
																		<img class="img-responsive" src="images/product1.jpg" alt="prewiew" width="120" height="80">
														</div>
														<div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
																<h4 class="product-name"><strong>MacBook Pro</strong></h4>
																<h4>
																		<small>1123€</small>
																</h4>
														</div>
														<div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right ">
																<p>15/4/2016</p>
															</div>
													</div>
												<hr>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-2 text-center">
                                    <img class="img-responsive" src="images/product1.jpg" alt="prewiew" width="120" height="80">
                            </div>
                            <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                <h4 class="product-name"><strong>MacBook Pro</strong></h4>
                                <h4>
                                    <small>1123€</small>
                                </h4>
                            </div>
                            <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right ">
                                <p>15/4/2016</p>
                              </div>
                          </div>
                        <hr>
									</div>
							</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

@endsection