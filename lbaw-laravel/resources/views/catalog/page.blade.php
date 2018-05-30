@extends('layouts.app')

@section('content')

<div class="catalog container-fluid">
<h2> {{$category->name}} Catalog</h2>

	<div class="row justify-content-center">

        @each('partials.product_searched',$products_paginate, 'product')

    </div>
</div>


{{$products_paginate->links()}}

@endsection