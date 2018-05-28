<nav id="catalog-nav" class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
  <a class="navbar-brand d-md-none">Catalog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2" aria-controls="navbar2" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-angle-down"></i>
    </button>

    <div id="navbar2" class="collapse navbar-collapse " >
      <ul class="navbar-nav  w-100 justify-content-between ">   
     @each('partials.categories',App\Category::get(), 'category')
      </ul>
    </div>
</nav>