@extends('layouts.app')

@section('content')

<ol style="margin-bottom:15px;" class="p_breadcrumb breadcrumb">
    <li class="breadcrumb-item h6"><a href="/">Home</a></li>
    <li class="breadcrumb-item h6">Search</li>
    <li class="breadcrumb-item active h6">{{$text}}</li>
</ol>
<hr>

<div id="search-title" class="row h2">
Search Results
</div>
<hr>
<div id="search-container" class="container-fluid">
  <div class="row justify-content-center">

      @each('partials.product_searched',$products,'product')
</div>
</div>
@endsection
