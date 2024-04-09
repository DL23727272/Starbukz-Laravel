  @section('navbar')
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg shadow-lg sticky-top" id="navbar">
    <div class="container-sm d-flex justify-content-between" style="width: 100%">

      <div class="d-flex justify-content-between align-items-center" style="width: 100vw">
        <div>
          <a href="#"> <img src="{{ asset('assets/img/logo.png') }}" alt="" style="width: 100px" /></a>
        </div>
        <div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent">
            <i class="fa-solid fa-mug-hot" id="mugIcon"></i>
          </button>
        </div>
      </div>

      <div class="collapse navbar-collapse container-fluid" id="navbarSupportedContent" style="width: 30vw">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="#">
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="#content">
              Product
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="cart.html">
              Cart(<span id="cartCount">0</span>)
            </a>
          </li>
        </ul>
      </div>

    </div>
  </nav>
  <!--End ti Navbar -->
