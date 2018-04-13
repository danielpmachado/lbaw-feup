@extends('layouts.app')

@section('content')
<section class="carousel slide bg-overlay-light container-fuild" id="carouselExampleCaptions">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
  </ol>
  <div class="carousel-inner " role="listbox">
    <div class="carousel-item active">
      <img class="d-block w-100 text-center" alt="First slide" src="images/asus0.png ">
      <div class="carousel-caption ">
           <a href="#" class="btn btn-dark btn-capsul px-4 py-2">Explore More</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" alt="First slide" src="images/asus00.png">
      <div class="carousel-caption ">
           <a href="#" class="btn btn-dark btn-capsul px-4 py-2">Explore More</a>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</section>


<div id="featured" class="row h2">
Featured Products
</div>
<div id="featured-container" class="container-fluid">
  <div class="row justify-content-center">
      <div class="card col-lg-3 col-md-4 col-sm-6">
      <img class="card-img-top" src="images/product11.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Asus P3-Hfdsfd</h5>
        <p class="card-text">756€ - Available</p>
        <div class="card-btn">
            <a href="product.html" class="btn  btn-success btn-block">Add to Cart</a>
            <a href="product.html" class="btn  btn-dark  btn-block">See More</a>
        </div>
      </div>
      </div>
      <div class="card col-lg-3 col-md-4 col-sm-6">
      <img class="card-img-top" src="images/product2.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Asus P3-Hfdsfd</h5>
        <p class="card-text">756€ - Available</p>
        <div class="card-btn">
            <a href="product.html" class="btn  btn-success btn-block">Add to Cart</a>
            <a href="product.html" class="btn  btn-dark  btn-block">See More</a>
        </div>
      </div>
      </div>
      <div class="card col-lg-3 col-md-4 col-sm-6">
      <img class="card-img-top" src="images/product3.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Asus P3-Hfdsfd</h5>
        <p class="card-text">756€ - Available</p>
        <div class="card-btn">
            <a href="product.html" class="btn  btn-success btn-block">Add to Cart</a>
            <a href="product.html" class="btn  btn-dark  btn-block">See More</a>
        </div>
      </div>
      </div>
      <div class="card col-lg-3 col-md-4 col-sm-6">
      <img class="card-img-top" src="images/product4.jpeg" alt="Card image cap">
      <div class="card-body">
          <h5 class="card-title">Asus P3-Hfdsfd</h5>
          <p class="card-text">756€ - Available</p>
          <div class="card-btn">
              <a href="product.html" class="btn  btn-success btn-block">Add to Cart</a>
              <a href="product.html" class="btn  btn-dark  btn-block">See More</a>
          </div>
      </div>
      </div>
</div>
</div>
@endsection