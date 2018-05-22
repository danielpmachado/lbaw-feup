@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
    <li class="breadcrumb-item"><a href="catalog.html">Catalog</a></li>
    <li class="breadcrumb-item active">{{$product->name}}</li>
  </ol>

<div class="container-fluid product-section">


	<div class="row">
		<div class="col-md-6 text-center">
			<img class="product-image" alt="product preview" src="images/IphoneX.png" />

		<div class="row">
			<div class="col-md-12">
			<div class="rating-block">
				<h2 class="bold padding-bottom-7">4.3 <small>/ 5</small></h2>
				<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
					<i class="fa fa-star"></i>
				</button>
				<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
					<i class="fa fa-star"></i>
				</button>
				<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
					<i class="fa fa-star"></i>
				</button>
				<button type="button" class="btn btn-dark  btn-sm" aria-label="Left Align" disabled>
					<i class="fa fa-star"></i>
				</button>
				<button type="button" class="btn btn-dark btn-grey btn-sm" aria-label="Left Align" disabled>
					<i class="fa fa-star"></i>
				</button>
			</div>
			</div>
		</div>
		</div>
		<div class="col-md-6" id="description-box">
			<h4 class="text" id="product-name-details">IPHONE X - 256 GB</h4>
			<h3 class="text-success" id="price-tag">1199 €</h3>

			<div class="row">
				<div class="col-md-12 ">

					<div id="purchases-buttons">
						<button type="button" class="btn btn-outline-success">
							<i class="fa fa-shopping-cart"></i> Add to Cart
						</button>
						<button type="button" class="btn btn-outline-danger">
							<i class="fa fa-heart"></i> Add to Favorites
						</button>
					</div>

					<p><span class="description-tag">Description</span></p>
					<p>
						smartphone with 256 GB storage capacity and 5.8 "Super Retina display (2436 x 1125 pixels at 458 dpi),
						with contrast ratio of 1000000: 1;
						resistant to water and dust; Face ID;
						Bionic A11 processor with 64-bit architecture; wireless charging;
						12MP wide-angle and telephoto cameras and TrueDepth camera;
						4K video recording at 24, 30 or 60 fps; Talk time (wireless) up to 21 hours.
					</p>
				</div>
			</div>
        <br><br><br><br>

		</div>
	</div>
</div>

<div class="container-fluid review-section">

<div class="row">
  <div class="col-md-3 text-center">
    <h2>Reviews</h2>
  </div>

</div>



	<div class="row">
		<div class="col-md-12">
				<hr/>
				<div class="row">
					<div class="col-sm-3 text-center">
						<img src="images/default.png" class="rounded" height="60" width="60">
						<div class="review-block-name">nktailor</div>
						<div class="review-block-date">January 29, 2016<br/>1 day ago</div>
					</div>
					<div class="col-sm-9">
						<div class="review-block-rate">
							<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-dark btn-grey btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-dark btn-grey btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
						</div>
						<div class="review-block-title"> <strong>The huge leap</strong> </div>
						<div class="review-block-description">The iPhone X is the huge leap forward that Apple's handsets needed. Aside from the original iPhone in 2007, this new iPhone is set to have the biggest impact on Apple’s smartphone direction ever.</div>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-sm-3 text-center">
						<img src="images/default.png" class="rounded" height="60" width="60">
						<div class="review-block-name">nktailor</div>
						<div class="review-block-date">January 29, 2016<br/>1 day ago</div>
					</div>
					<div class="col-sm-9">
						<div class="review-block-rate">
							<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-dark btn-grey btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-dark btn-grey btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
						</div>
						<div class="review-block-title"> <strong>The huge leap</strong> </div>
						<div class="review-block-description">The iPhone X is the huge leap forward that Apple's handsets needed. Aside from the original iPhone in 2007, this new iPhone is set to have the biggest impact on Apple’s smartphone direction ever.</div>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-sm-3 text-center">
						<img src="images/default.png" class="rounded" height="60" width="60">
						<div class="review-block-name">nktailor</div>
						<div class="review-block-date">January 29, 2016<br/>1 day ago</div>
					</div>
					<div class="col-sm-9">
						<div class="review-block-rate">
							<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-primary btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-dark btn-grey btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-dark btn-grey btn-sm" aria-label="Left Align" disabled>
								<i class="fa fa-star"></i>
							</button>
						</div>
						<div class="review-block-title"> <strong>The huge leap</strong> </div>
						<div class="review-block-description">The iPhone X is the huge leap forward that Apple's handsets needed. Aside from the original iPhone in 2007, this new iPhone is set to have the biggest impact on Apple’s smartphone direction ever.</div>
					</div>
				</div>
				<hr/>
				<form class="submit-comment">
					<div class="form-group">
						<label for="Textarea1">Rate iPhoneX</label>
						<div class="review-block-rate">
							<button type="button" class="btn btn-outline-dark btn-sm" aria-label="Left Align" >
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-outline-dark btn-sm" aria-label="Left Align" >
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-outline-dark btn-sm" aria-label="Left Align" >
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-outline-dark btn-sm" aria-label="Left Align" >
								<i class="fa fa-star"></i>
							</button>
							<button type="button" class="btn btn-outline-dark btn-sm" aria-label="Left Align" >
								<i class="fa fa-star"></i>
							</button>
						</div>
					</div>
					<div class="form-group">
							<textarea class="form-control" id="Textarea1" rows="4" placeholder="Leave your opinion"></textarea>
						</div>
					<div class="form-group">
							<button type="submit" class="btn btn-dark ">Submit Comment</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection  
      