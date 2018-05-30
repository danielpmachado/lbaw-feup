<div class="card col-lg-3 col-md-4 col-sm-6">
    <a href="user.html">
        <img class="card-img-top" src="/images/avatars/{{$user->avatar}}" alt="Card image cap">
    </a>
    <div class="card-body">
    <h5 class="card-title">{{$user->username}}</h5>
    <p class="card-text">{{$user->email}}</p>
        <div class="card-btn">
                @if($user->blocked == 0)
                <a href="" class="btn  btn-warning  btn-block" data-toggle="modal" data-target="#blockUser">Block</a>
                @else
                <a href="" class="btn  btn-warning  btn-block" data-toggle="modal" data-target="#blockUser">Unblock</a>
                @endif
                <a href="" class="btn  btn-danger  btn-block" data-toggle="modal" data-target="#deleteAccount">Ban</a>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                By deleting this account all the personal data will be lost and you will no longer be able to make purchases at Tech4U website.
                This user must have done something seriously bad for you to take this action.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{ route('delete_user', ['id' => $user->id]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            </div>
        </div>
</div>

<div class="modal fade" id="blockUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                By deleting this account the user will not be able to access his private area.
                This user must have done something seriously bad for you to take this action.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{ route('block_user', ['id' => $user->id]) }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-warning">Block</button>
                </form>
            </div>
            </div>
        </div>
</div>
