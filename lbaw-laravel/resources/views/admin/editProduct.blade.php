@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <img class="profile-user-pic" src="/images/products/{{$product->pic}}" alt="product preview">

                        <div class="profile-user-name">
                            {{$product->name}}
                        </div>


                </div>
            </div>
            <div class="profile-tabs tab-content col-md-9">
                <div id="overview" class="tab-pane fade show active">
                    <div class="card fav-card">
                         <div class="card-header bg-dark text-light">Edit Product</div>
                        <div class="card-body">
                            <form form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('update_product', ['id' => $product->id])}}">
                              {{ csrf_field() }}
                                <div class="form-group">
                                        <a> Name </a>
                                        <input  id="name" type="text" class="form-control" name="name" value="{{ $product->name  }}" required autofocus>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6 ">
                                            <a> Price </a>
                                            <input  id="price" type="text" class="form-control" name="price" value="{{ $product->price }}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <a> Stock </a>
                                            <input  id="stock" type="text" class="form-control" name="stock" value="{{ $product->stock }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <a> Description </a>
                                        <textarea id="description" type="text" class="form-control" name="description" rows="10"required>{{ $product->description }}</textarea>
                                    </div>

                                    <div  class="form-group">
                                        <a> Product Image </a>
                                        <input style="margin-left:20px;"type="file" name="avatar">
                                    </div>


                                    <div class="form-group float-left">
                                        <button type="submit" class="btn btn-dark ">Save Changes</button>
                                    </div>

                                </form>


                                <!-- Modal -->
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
                                        By deleting your account all your personal data will be lost and you will no longer be able to make purchases at Tech4U website.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form action="{{ route('delete_user', ['id' => Auth::user()->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
