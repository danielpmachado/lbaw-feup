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
                         <div class="card-header bg-dark text-light">Add Product</div>
                        <div class="card-body">
                            <form form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('insertProduct')}}">
                              {{ csrf_field() }}
                                <div class="form-group">
                                        <a> Name </a>
                                        <input  id="name" type="text" class="form-control" name="name" value="{{ $product->name  }}" required autofocus>
                                    </div>
                                    <div class="form-row">
                                           <div class="form-group col-md-6 ">
                                               <a> Brand </a>
                                               <input  id="brand" type="text" class="form-control" name="brand" value="{{ $product->brand }}" required>
                                           </div>
                                           <div class="form-group col-md-6">
                                               <a> Category </a>
                                               <input  id="category" type="text" class="form-control" name="category" value="{{ $product->brand }}" required>
                                           </div>
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
                                        <button type="submit" class="btn btn-dark ">Add Product to the Store</button>
                                    </div>

                                </form>




                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
