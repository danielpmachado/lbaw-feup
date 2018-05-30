@extends('layouts.app')

@section('content')
<div id="progress-bar" class="container">
    <div class="row">
        <div class="board">
            <ul class="nav nav-tabs">
                <div class="liner"></div>
                <li rel-index="0" class="active">
                    <a href="#step-1" class="btn" aria-controls="step-1" role="tab" data-toggle="tab">
                        <span> 1  </span>
                        <a>  Cart </a>
                    </a>
                </li>
                <li rel-index="1">
                    <a href="#step-2" class="btn disabled" aria-controls="step-2" role="tab" data-toggle="tab">
                        <span> 2  </span>
                        <a> Expedition </a>

                    </a>
                </li>
                <li rel-index="2">
                    <a href="#step-3" class="btn disabled" aria-controls="step-3" role="tab" data-toggle="tab">
                        <span> 3 </span>
                        <a> Payment </a>
                    </a>
                </li>
                <li rel-index="3">
                    <a id="step-4-link" href="#step-4" class="btn disabled" aria-controls="step-4" role="tab" data-toggle="tab">
                        <span> 4</span>
                        <a> Confirmation</a>
                    </a>
                </li>
            </ul>
        </div>

         <?php
            $total =0;

            foreach($products as $product)
                $total += $product->price * $product->pivot->quantity;

        ?>
        
        <div class="tab-content">
            @include('cart.cart')
            @include('cart.expedition')
            @include('cart.payment')
            @include('cart.confirmation')
        </div>
    </div>
</div>

<script>
$(function() {
// Nav Tab stuff
$('.nav-tabs > li > a').click(function() {
    if($(this).hasClass('disabled')) {
        return false;
    } else {
        var linkIndex = $(this).parent().index() - 1;
        $('.nav-tabs > li').each(function(index, item) {
            $(item).attr('rel-index', index - linkIndex);
        });
    }
});
$('#step-1-next').click(function() {
    // Check values here
    var isValid = true;
    
    if(isValid) {
        $('.nav-tabs > li:nth-of-type(2) > a').removeClass('disabled').click();
    }
});
$('#step-2-next').click(function() {
    // Check values here
    var isValid = true;
    
    if(isValid) {
        $('.nav-tabs > li:nth-of-type(3) > a').removeClass('disabled').click();
    }
});
$('#step-3-next').click(function() {
    // Check values here
    var isValid = true;
    
    if(isValid) {
        $('.nav-tabs > li:nth-of-type(4) > a').removeClass('disabled').click();
    }
});
});
</script>
@endsection
