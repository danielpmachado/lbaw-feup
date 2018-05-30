@extends('layouts.app')

@section('content')

<div class="catalog container-fluid">
<h2> {{$category->name}} Catalog</h2>

	<div class="row justify-content-center">

        @each('partials.product_searched',$category->products, 'product')

    </div>
</div>

@endsection