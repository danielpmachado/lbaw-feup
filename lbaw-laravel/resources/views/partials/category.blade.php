

<!--- new category -->

<li id="" class="dropdown mega-dropdown show">
        <a href="#" class="" data-toggle="dropdown">{{$category->name}} </a>
        <ul  class="dropdown-menu mega-dropdown-menu show">
          <li class="col-6 col-sm-4 col-md-3 nav-column">
            <ul>
              <h3 class="dropdown-header ">Desktops</h3>
                <li><a href="#">Tech4U Gaming</a></li>
                <li><a href="#">Tech4U Workstation</a></li>
                <li><a href="#">Gaming</a></li>
                <li><a href="#">Workstation</a></li>
                <li class="divider"></li>
              <h3 class="dropdown-header">Fonts</h3>
                            <li><a href="#">Glyphicon</a></li>
              <li><a href="#">Google Fonts</a></li>
            </ul>
          </li>
          <li class="col-6 col-sm-4 col-md-3 nav-column">
            <ul>
               @each('partials.brand',$category->products, 'product')
            </ul>
          </li>
          <li class="col-6 col-sm-4 col-md-3 nav-column">
            <ul>
              <h3 class="dropdown-header ">Tablet PCs</h3>
              <li><a href="#">Android Tablet</a></li>
              <li><a href="#">Windows Tablet</a></li>
              <li><a href="#">2 In 1 Tablet</a></li>
              <li><a href="#">Phablet</a></li>
              <li><a href="#">Kids Tablet </a></li>
              <li><a href="#">Gaming Tablet</a></li>
            </ul>
          </li>
          <li class="col-sm-3 nav-column " id="image">
            <ul>
            <li class="dropdown-header">Featured</li>
                    <div id="menCollection" class="carousel slide" data-ride="carousel"> 
                      <div class="carousel-inner">
                        <div class="item active">
                            <a href="#"><img src="{{ URL::to('/') }}/images/home1.jpg" height="200em" width="300em"class="img-responsive rounded" alt="product 1"></a>
                           <button style="margin-top:7px" href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>
                      </div>
                   </div>
                </div>
             <li class="divider"></li>
          </ul>
          </li>
        </ul>
</li>