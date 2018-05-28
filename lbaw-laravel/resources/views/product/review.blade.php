

<div class="row">
    <div class="col-sm-3 text-center">
        <img src="/images/avatars/default.png" class="rounded" height="60" width="60">
        <div class="review-block-name">{{$review->user->username}}</div>
    <div class="review-block-date">{{substr($review->date,0,10) }}</div>
    </div>
    <div class="col-sm-9 col-md-8">
        <div class="review-block-rate">
            <button type="button" class="btn @if($review->score > 0) btn-primary @else btn-dark btn-grey @endif  btn-sm" aria-label="Left Align" disabled>
                    <i class="fa fa-star"></i>
            </button>
            <button type="button" class="btn @if($review->score > 1) btn-primary @else btn-dark btn-grey @endif  btn-sm" aria-label="Left Align" disabled>
                    <i class="fa fa-star"></i>
            </button>
            <button type="button" class="btn @if($review->score > 2) btn-primary @else btn-dark btn-grey @endif  btn-sm" aria-label="Left Align" disabled>
                    <i class="fa fa-star"></i>
            </button>
            <button type="button" class="btn @if($review->score > 3) btn-primary @else btn-dark btn-grey @endif  btn-sm" aria-label="Left Align" disabled>
                    <i class="fa fa-star"></i>
            </button>

            <button type="button" class="btn @if($review->score > 4) btn-primary @else btn-dark btn-grey @endif  btn-sm" aria-label="Left Align" disabled>
                    <i class="fa fa-star"></i>
            </button>
        </div><br>
        <div class="review-block-description">{{$review->comment}}</div>
    </div>
</div>
