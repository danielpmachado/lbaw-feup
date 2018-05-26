@extends('layouts.app')

@section('content')
<section class="carousel slide bg-overlay-light container-fuild" id="carouselExampleCaptions">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
  </ol>
  <div class="carousel-inner " role="listbox">
    <div class="carousel-item active">
      <img class="d-block w-100 text-center" alt="First slide" src="{{ URL::to('/') }}/images/asus0.png">
      
      <div class="carousel-caption ">
           <a href="#" class="btn btn-dark btn-capsul px-4 py-2">Explore More</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" alt="First slide" src="{{ URL::to('/') }}/images/asus00.png">
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

      <?php foreach($featuredProducts as $featuredProduct) {
        ?>
        @include('pages.partials.featured')
      <?php } ?>

</div>
</div>
@endsection