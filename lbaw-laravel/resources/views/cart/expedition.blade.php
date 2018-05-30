<div role="tabpanel" class="tab-pane" id="step-2">
    <div class="container-fluid" style="width:70%;">
        <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">Expedition Info</div>
            <div class="card-body">
                <form class="form-horizontal">
                
                    <div class="form-group">
                        <a> Address </a>
                        <input  id="address" type="text" class="form-control" name="address" value="{{ $user->address }}" required>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group col-md-8 ">
                            <a> City </a>
                            <input  id="city" type="text" class="form-control" name="city" value="{{ $user->city }}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <a> Zip </a>
                            <input  id="zip" type="text" class="form-control" name="zip" value="{{ $user->zip }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <a> Contact </a>
                        <input  id="contact" type="text" class="form-control" name="contact" value="{{ $user->email }}" required>
                    </div>
                </form>
                </div>
                <div class="card-footer ">
                    <button id="step-2-next"  type="submit" class="btn btn-outline-dark float-right">
                        Next
                    </button>
                </div>
            
        </div>
    </div>
</div>