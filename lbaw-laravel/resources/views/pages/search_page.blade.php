@extends('layouts.app')

@section('content')

<div id="featured" class="row h2">
Search Results
</div>
<div id="featured-container" class="container-fluid">
  <div class="row justify-content-center">

      @each('partials.product_searched',$products,'product')
</div>
</div>
@endsection
