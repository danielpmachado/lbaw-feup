@extends('layouts.app')

@section('content')
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ URL::to('/') }}/images/carousel/banner-huawei-p20pro.jpg" alt="huawei p20 pro" width="1200" height="300">
    </div>
    <div class="carousel-item">
      <img src="{{ URL::to('/') }}/images/carousel/banner-iphone-x.jpg" alt="iPhone X" width="1200" height="300">
    </div>
    <div class="carousel-item">
      <img src="{{ URL::to('/') }}/images/carousel/banner-ps4.jpg" alt="Ps4" width="1200" height="300">
    </div>
    <div class="carousel-item">
      <img src="{{ URL::to('/') }}/images/carousel/banner-macbook.jpg" alt="Macbook" width="1200" height="300">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


<div id="featured" class="row h2">
Featured Products
</div>
<div id="featured-container" class="container-fluid">
  <div class="row justify-content-center">

      @each('partials.featured',$featuredProducts,'featuredProduct')

</div>
</div>
@endsection
