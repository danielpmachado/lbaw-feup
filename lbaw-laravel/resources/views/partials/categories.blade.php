<li class="nav-item">
    <div class="dropdown">

        <a class="nav-link" href="#" id="{{$category->name}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-{{$category->icon}}"></i>{{$category->name}}
        </a>

        <div id="drop-1" class="dropdown-menu"  aria-labelledby="dropdownMenu2" >
            <div class="row mx-0 ">
                <div class="col-sm-12 ">    
                    <h5>{{$category->name}}</h5>
                    <ul class="list-group list-group-flush">
                    @each('partials.category',$category->products, 'product')
                    </ul>
                 </div>
             </div>
        </div>
    </div>
</li>