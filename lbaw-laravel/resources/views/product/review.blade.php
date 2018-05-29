<div class="row review-container" data-id="{{$review->id}}">
    <div class="col-sm-3 text-center">
        <img src="/images/avatars/default.png" class="rounded" height="60" width="60">
        <div class="review-block-name">{{$review->user->username}}</div>
        <div class="review-block-date">{{substr($review->date,0,10) }}</div>
    </div>
    <div class=" @if(Auth::check()) @if(Auth::user()->permissions == 'Admin') col-sm-8 @else col-sm-9 @endif @else col-sm-9 @endif">
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

        @if(Auth::check())
        @if(Auth::user()->permissions == 'Admin')
        <div class="col-sm-1 text-center center-aligned">
                <button type="button" class="btn btn-outline-danger delete_review" data-toggle="modal" data-target="#deleteReview">
                        <i class="fa fa-trash"></i>
                </button>
        </div>
        @endif
        @endif
        <div class="modal fade remove_comment" id="deleteReview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        	<div class="modal-dialog modal-dialog-centered" role="document">
        		<div class="modal-content">
        		<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
        			</button>
        		</div>
        		<div class="modal-body">
                                By deleting this review you should have a strong reason: inappropriate or offensive language, disrespect for other users, etc.

        		</div>
        		<div class="modal-footer">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        			<button id="delete" type="submit" class="btn btn-danger" data-dismiss="modal">Delete</button>

        		</div>
        		</div>
        	</div>
        </div>




</div>
<hr/>


<div class="modal fade" id="deleteReview2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                        By deleting this review you should have a strong reason: inappropriate or offensive language, disrespect for other users, etc.
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form >
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                </div>
                </div>
        </div>
</div>
