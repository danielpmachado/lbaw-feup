

<!--- new category -->

<li id="" class="dropdown mega-dropdown show">
        <a href="#" class="" data-toggle="dropdown">{{$category->name}} </a>
        <ul  class="dropdown-menu mega-dropdown-menu show">
          <li class="col-6 col-sm-4 col-md-3 nav-column">
            <ul>
              <h3 class="dropdown-header ">Our Favorites</h3>
                  @php
                    $products = $category->products;
                  @endphp
                  @for($i=0;$i<2;$i++)
                    <li><a href="/products/{{ $products->slice($i, 1)->first()['id'] }}">{{$products->slice($i,1)->first()['name']}} </a></li>
                  @endfor
                <li class="divider"></li>
              <h3 class="dropdown-header">More</h3>
                  @for($i=4;$i<5;$i++)
                    <li><a href="/products/{{ $products->slice($i, 1)->first()['id'] }}">{{$products->slice($i,1)->first()['name']}} </a></li>
                  @endfor
            </ul>
          </li>
          <li class="col-6 col-sm-4 col-md-3 nav-column">
            <ul>
               <h3 class="dropdown-header ">New Items</h3>

               @for($i=2;$i<4;$i++)
                <li><a href="/products/{{ $products->slice($i, 1)->first()['id'] }}">{{$products->slice($i,1)->first()['name']}} </a></li>
                @endfor

            </ul>
          </li>
          <li class="col-6 col-sm-4 col-md-3 nav-column">
            <ul>
              <h3 class="dropdown-header ">Flash Sale</h3>


              @for($i=5;$i<10;$i++)

                <li><a href="/products/{{ $products->slice($i, 1)->first()['id'] }}">{{$products->slice($i,1)->first()['name']}} </a></li>
              @endfor




            </ul>
          </li>
          <li class="col-sm-3 nav-column " id="image">
            <ul>
            <li class="dropdown-header"></li>
                    <div id="menCollection" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="item active">
                            <a href="#"><img src="{{ URL::to('/') }}/images/products/{{$category->name}}.png" height="200em" width="300em"class="img-responsive rounded" alt="product 1"></a>
                          <!-- <button style="margin-top:7px" href="#" class="btn btn-outline-dark" type="button">{{$category->name}}  Catalog</button>-->
                      </div>
                   </div>
                </div>
             <li class="divider"></li>
          </ul>
          <a  href="{{route('catalog', ['type' => $category->name])}}" id="nav_button" style="margin-top:7px"  class="btn btn-outline-dark" type="submit">{{$category->name}} Catalog</a>
        </li>
        </ul>
</li>
