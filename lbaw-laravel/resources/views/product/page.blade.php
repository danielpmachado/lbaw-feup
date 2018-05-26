@extends('layouts.app')

@section('content')
<ol class="p_breadcrumb breadcrumb">
    <li class="breadcrumb-item h6"><a href="/">Home</a></li>
    <li class="breadcrumb-item h6"><a href="catalog.html">Catalog</a></li>
    <li class="breadcrumb-item active h6">{{$product->name}}</li>
</ol>
<hr>

<div class="product-section">
	<div class="container-fluid product-page product" data-id="{{ $product->id }}">

	<div class="row">
		<div class="col-md-6 text-center">
			<img class="product-image" alt="product preview" src="/images/products/{{$product->pic}}" />

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
				<button type="button" class="btn btn-primary btn-sm" data-id="{{ $product->id }}"aria-label="Left Align" disabled>
					<i class="fa fa-star"></i>
				</button>
				<button type="button" class="btn btn-primary btn-sm" data-id="{{ $product->id }}"ia-label="Left Align" disabled>
					<i class="fa fa-star"></i>
				</button>
				<button type="button" class="btn btn-dark btn-grey btn-sm" data-id="{{ $product->id }}" aria-label="Left Align" disabled>
					<i class="fa fa-star"></i>
				</button>
			</div>
			</div>
		</div>
		</div>
		<div class="col-md-6" id="description-box">
			<h4 class="text" id="product-name-details">{{$product->name}}</h4>
			<h3 class="text-success" id="price-tag">{{$product->price}} €</h3>

			<div class="row">
				<div class="col-md-12 ">

					<div class="product-buttons" >
						<button type="button" class="btn btn-outline-success">
							<i class="fa fa-shopping-cart"></i> Add to Cart
						</button>
						@if(Auth::check())
						@if($product->favorited())
						<button id="fav" type="button" class="btn btn-outline-danger" value="remove">
							<i class="fa fa-trash"></i> Remove from Wishlist
						</button>
						@endif
						@else
						<button id="fav" type="button" class="btn btn-outline-danger" value="add">
							<i class="fa fa-heart"></i> Add to Wishlist
						</button>
						@endif
					</div>

					<p><span class="description-tag">Description</span></p>
					{{$product->description}}
				</div>
			</div>
        <br><br><br><br>

		</div>
	</div>
</div>
@include('product.reviews')
@endsection
