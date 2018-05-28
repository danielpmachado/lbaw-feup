<div class="container-fluid review-section" data-id="{{ $product->id }}">
    <div class="row m-2">
        <div class="col-md-3 ">
            <h3 style="text-align:center;">Reviews</h3>
        </div>
    </div>

    <div class="row m-2">
        <div class="col-md-12">
            <hr/>

            @each('product.review',$reviews, 'review')
           
            <form class="submit-review">
                <div class="form-group">
                    <label for="Textarea1">Rate {{$product->name}}</label>
                    <div class="review-block-rate">
                        <button id="btn1" type="button" class="btn btn-outline-dark btn-sm" aria-label="Left Align" >
                            <i class="fa fa-star"></i>
                        </button>
                        <button id="btn2" type="button" class="btn btn-outline-dark btn-sm" aria-label="Left Align" >
                            <i class="fa fa-star"></i>
                        </button>
                        <button id="btn3" type="button" class="btn btn-outline-dark btn-sm" aria-label="Left Align" >
                            <i class="fa fa-star"></i>
                        </button>
                        <button id="btn4" type="button" class="btn btn-outline-dark btn-sm" aria-label="Left Align" >
                            <i class="fa fa-star"></i>
                        </button>
                        <button id="btn5" type="button" class="btn btn-outline-dark btn-sm" aria-label="Left Align" >
                            <i class="fa fa-star"></i>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                        <textarea class="form-control" id="comment" rows="4" placeholder="Leave your opinion"></textarea>
                </div>
                @if(Auth::check())
                <div class="form-group">
                        <button id="submit_review" type="submit" class="btn btn-dark ">Submit Review</button>
                </div>
                @else
                <div class="form-group">
                        <button id="submit_review" type="submit" class="btn btn-dark " data-toggle="modal" data-target="#buttons-modal">Submit Review</button>
                </div>
                @endif
            </form>
           
        </div>
    </div>
</div>
