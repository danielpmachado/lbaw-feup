<nav id="catalog-nav" class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
  <a class="navbar-brand d-md-none">Catalog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-angle-down"></i>
    </button>

    @foreach(App\Category::get() as $category)
    <div id="navbar2" class="collapse navbar-collapse " >
      <ul class="navbar-nav  w-100 justify-content-between ">
        <li class="nav-item">
          <div class="dropdown">

              <a class="nav-link" href="#" id="{{$category->name}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-{{$category->icon}}"></i>{{$category->name}}
              </a>

              <div id="drop-1" class="dropdown-menu"  aria-labelledby="dropdownMenu2" >
                <div class="row mx-0 ">
                  <div class="col-sm-12 ">
                    <ul class="list-group list-group-flush">
                      <!-- <li class="list-group-item d-flex justify-content-between align-items-center p-1">
                        <a>Asus</a>
                        <span class="badge badge-dark badge-pill">14</span>
                      </li> -->
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
     </div>
     @endforeach

  </nav>