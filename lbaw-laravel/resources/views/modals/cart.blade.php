<div class="modal fade" id="buttons-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="modal-cart">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Access Denied</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            You need to Sign In in order to access to the cart and wishlist section.<br>
            If you don't have an account you should register yourself.
        </div>
        <div class="modal-footer" id="cart-footer">
        <form action="{{ route('register') }}">
        {{ csrf_field() }}
        {{ method_field('GET') }}
        <button class="btn btn-dark" type="submit" style="padding-right=5em; padding-left=5em;"> Sign Up </button>
        </form>
        <button type="button" class="btn btn-success" data-dismiss="modal" style="padding-right=5em; padding-left=5em;"> OK </button>
        </div>
    </div>
    </div>
</div>

