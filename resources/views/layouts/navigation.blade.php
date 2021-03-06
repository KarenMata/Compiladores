<!-- Navbar (Solid background + shadow)-->
<!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
<header class="cs-header">
  <div class="navbar navbar-expand-lg navbar-light bg-light navbar-box-shadow navbar-sticky" data-scroll-header>
    <div class="navbar-search bg-light">
      <div class="container d-flex flex-nowrap align-items-center"><i class="fe-search font-size-xl"></i>
        <input class="form-control form-control-xl navbar-search-field" type="text" placeholder="Search site">
        <div class="d-none d-sm-block flex-shrink-0 pl-2 mr-4 border-left border-right" style="width: 10rem;">
          <select class="form-control custom-select pl-2 pr-0">
            <option value="all">All categories</option>
            <option value="clothing">Clothing</option>
            <option value="shoes">Shoes</option>
            <option value="electronics">Electronics</option>
            <option value="accessoriies">Accessories</option>
            <option value="software">Software</option>
            <option value="automotive">Automotive</option>
          </select>
        </div>
        <div class="d-flex align-items-center"><span class="text-muted font-size-xs mt-1 d-none d-sm-inline">Close</span>
          <button class="close p-2" type="button" data-toggle="search">&times;</button>
        </div>
      </div>
    </div>
    <div class="container px-0 px-xl-3">
      <button class="navbar-toggler ml-n2 mr-4" type="button" data-toggle="offcanvas" data-offcanvas-id="primaryMenu"><span class="navbar-toggler-icon"></span></button><a class="navbar-brand order-lg-1 mx-auto ml-lg-0 pr-lg-2 mr-lg-4" href="index.html"><img class="d-none d-lg-block" width="153" src="img/logo/logo-dark.png" alt="Around" /><img class="d-lg-none" width="58" src="img/logo/logo-icon.png" alt="Around" /></a>
      <div class="d-flex align-items-center order-lg-3 ml-lg-auto">
        <div class="navbar-tool"><a class="navbar-tool-icon-box mr-2" href="#" data-toggle="search"><i class="fe-search"></i></a></div>
        <div class="navbar-tool d-none d-sm-flex"><a class="navbar-tool-icon-box mr-2" href="#modal-signin" data-toggle="modal" data-view="#modal-signin-view"><i class="fe-user"></i></a></div>
        <div class="border-left mr-2" style="height: 30px;"></div>
        <div class="navbar-tool mr-2"><a class="navbar-tool-icon-box" href="#" data-toggle="offcanvas" data-offcanvas-id="shoppingCart"><i class="fe-shopping-cart"></i><span class="navbar-tool-badge">3</span></a></div>
      </div>
      <div class="cs-offcanvas-collapse order-lg-2" id="primaryMenu">
        <div class="cs-offcanvas-cap navbar-box-shadow">
          <h5 class="mt-1 mb-0">Menu</h5>
          <button class="close lead" type="button" data-toggle="offcanvas" data-offcanvas-id="primaryMenu"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="cs-offcanvas-body">
          <!-- Menu-->
          <ul class="navbar-nav">
            <li class="nav-item dropdown dropdown-mega active"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Inicio</a>
            </li>
            <li class="nav-item dropdown dropdown-mega"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Nosotros</a>
            </li>
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Contacto</a>
            </li>
          </ul>
        </div>
        <div class="cs-offcanvas-cap border-top"><a class="btn btn-translucent-primary btn-block" href="#modal-signin" data-toggle="modal" data-view="#modal-signin-view"><i class="fe-user font-size-lg mr-2"></i>Sign in</a></div>
      </div>
    </div>
  </div>
</header>