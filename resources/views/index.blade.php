<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Alertify sakit sa ulo -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/img/logo.ico">

     <!-- Sweet -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .thumb {
            display: flex;
            margin-top: -60px;
            justify-content: center;
        }
        .thumb a:hover {
            margin-top: -15px;
            transition: 0.2s;
        }
        .thumb img {
            width: 54px;
            margin: 20px 20px 0 10px;
            max-height: 100%;
        }
          .navbar {
            background-color: #006341;
            transition: background-color 0.3s ease;
          }
          .navbar.blurred {
            background-color: transparent; /* aalisin niya yung background color */
            backdrop-filter: blur(20px); /* then eto papalit, blur effect */
          }
          .nav-link {
            color: white;
            font-weight: 500;
            transition: color 0.3s ease
          }
          .nav-link.scrolled {
            color: #000000;
            font-weight: 500;
          }
          .nav-link.scrolled:hover {
            color: #006341;
            font-weight: 500;
          }
          input{
            border-radius: 10px;
            background: #c8c1c1;
            box-shadow: inset 5px 5px 6px #8a8585,
                        inset -5px -5px 6px #fffdfd;
          }
          .login_card{
            height: 90%;
            border-radius: 6px;
            background-color: rgba(255, 255, 255, 0.385);
            backdrop-filter: blur(10px);
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
          }
          .login__bg{
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            z-index: -1;
          }
           /* Scrollbar*/
          ::-webkit-scrollbar {
            width: 20px;
          }
          ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
          }
          ::-webkit-scrollbar-thumb {
            background: #006341;
            border-radius: 10px;
          }
          ::-webkit-scrollbar-thumb:hover {
            background: #b30000;
          }
          /* END OF Scrollbar */
    </style>
</head>
<body>
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
                    <a class="nav-link  " href="#products">
                        Products
                    </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
      <!--End ti Navbar -->

      <img src="{{ asset('assets/img/banner.jpg') }}" alt="image" class="login__bg">

      <!-- LOGIN FORM -->
      <section class="vh-100">

        <div class="container-sm mt-5 ">
          <div class="row">

            <div class="col">
            </div>

            <div class="col">
            </div>

            <div class="col ">
                <div class="login_card card mt-4">
                  <form action="{{ route('login.submit') }}" enctype="multipart/form-data" method="POST" class="mt-1">
                    @csrf
                    <div class="m-5">
                        <div class="form-group my-4">
                          <img src="{{ asset('assets/img/hero.png') }}" alt="" style="width: 300px; ">
                        </div>
                        <div class="form-group my-4">
                            <label for="Name" style="font-weight: 700;"><i class="fa-solid fa-signature"></i> Username</label>
                            <input type="text" name="customerName" id="customerName" placeholder="Enter Username" class=" form-control" required>
                        </div>
                        <div class="form-group my-4">
                          <label for="pass" style="font-weight: 700;"><i class="fa-solid fa-lock"></i> Password</label>
                          <input type="password" name="customerPassword" id="customerPassword" placeholder="Enter Password" class="  form-control" required>
                        </div>
                         <div class="col-sm">
                            <p style="font-size: 13px; color: rgb(0, 0, 0);">
                                Don't have an account?
                                <a  data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    style="text-overflow: unset; color: rgb(252, 254, 255); text-decoration: none; "
                                    onmouseover="this.style.textDecoration='underline'"
                                    onmouseout="this.style.textDecoration='none'">
                                  Sign up
                                </a>
                            </p>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-auto">
                                <button type="submit" id="addProductButton" class="btn btn-outline-light" onclick="customerLogin()">Login</button>
                            </div>
                        </div>
                    </div>
                  </form>
                </div>
            </div>

          </div>
        </div>

      </section>

      <!-- MODAL -->

      <div id="modalContainer"></div>

      <!-- END MODAL -->


        <!---Carousel-->

        <div class="container-sm mt-5 my-5 text-center">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-sm-12 col-md-4 mx-auto">
                    <img src="{{ asset('assets/img/img1.png') }}" alt="" class="starbucks img-fluid" style="width: 300px; height: 400px; filter: drop-shadow(11px 13px 9px #000000);
                -webkit-filter: drop-shadow(11px 13px 9px #000000); -moz-filter: drop-shadow(11px 13px 9px #000000);" />
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>

        <br>

        <div class="container mt-5">
            <div class="row">

                <div class="col-md-3">
                </div>

                <div class="col-md-6 my-5">
                <div class="thumb d-flex justify-content-center " >
                    <a href="#products">
                    <img id="bottom" src="{{ asset('assets/img/thumb1.png') }}" onmouseover="imgSlider('{{ asset('assets/img/img1.png') }}');" />
                    </a>
                    <a href="#products">
                    <img src="{{ asset('assets/img/thumb2.png') }}" onmouseover="imgSlider('{{ asset('assets/img/img2.png') }}');" />
                    </a>
                    <a href="#products">
                    <img src="{{ asset('assets/img/thumb3.png') }}" onmouseover="imgSlider('{{ asset('assets/img/img3.png') }}');" />
                    </a>
                    <a href="#products">
                    <img src="{{ asset('assets/img/thumb4.png') }}" onmouseover="imgSlider('{{ asset('assets/img/img4.png') }}');" />
                    </a>

                </div>
                </div>

                <div class="col-md-2">
                </div>

            </div>
        </div>
        <!--End Carousel-->


        <hr class="container-sm Sborder border-success mt-5 border-2 opacity-50" />


      <!--Hero-->
      <section class="container-sm">
        <div class="d-flex flex-column align-items-center text-center">
          <img
            src="{{ asset('assets/img/hero.png') }}"
            style="width: 200px; height: 45px"
            alt=""
            class="mt-5 mb-3 img-fluid"
            srcset=""
          />
          <p class="w-75 lead text-secondary fst-italic">
            Starbucks is more than just a coffee shop; it's a community hub where
            people connect over delicious drinks and meaningful moments. With our
            expertly crafted coffees, teas, and snacks, every visit is an
            opportunity to treat yourself to quality and comfort. From our iconic
            lattes to seasonal favorites, there's something for every palate. Join
            us at Starbucks and let's make every sip count.
          </p>

        </div>
      </section>
      <!-- End Hero-->

      <hr class="container-sm Sborder border-success mt-5 border-2 opacity-50" />
      <!-- PRODUCT CONTENT -->
      <section class="mt-5">
        <div class="container-sm">

          <div class="row justify-content-center">
            <div class="col-12 text-center">
              <h1 class="fst-italic">Our Products</h1>
            </div>
          </div>

          <div class=" w-100" id="products"></div>
             {!! $output !!}
          </div>
        </div>
      </section>
      <!-- END PRODUCT CONTENT -->

      <!---Footer-->
      <footer class="mt-5 text-white p-3" style="background-color: #006341;">
        <div class="container-sm d-flex justify-content-between align-items-center">
          <div class="">
            <h4>AI Tech</h4>
            <h5>CCSIT 210</h5>
            <p>BSIT-3A</p>
            <p>Worksheet 5.5 Database Driven JQuery Web-based Shop</p>
            <p>Submitted to: Sir. Donn Genita </p>
            <ul>
              <li>Dran Leynard Gamoso</li>
            </ul>
          </div>
          <div class="">
            <div>
              <img src="{{ asset('assets/img/top.png') }}" style=" width: 50px; height: 50px;" alt="">
            </div>
            <div>
              <p class="fst-bold">&copy; 2024; J&D</p>
            </div>
          </div>
        </div>
      </footer>
     <!---End Footer-->

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
     <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

     <script type="text/javascript">
         alertify.set('notifier', 'position', 'top-right');

         $(document).ready(function () {
             // Load modal content
             $('#modalContainer').load('{{ route("modal") }}');
         });

         //For navbar
         window.onscroll = function () { scrollFunction() };

         function scrollFunction() {
             if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                 $('#navbar').addClass('blurred');
                 $('.nav-link').addClass('scrolled');
                 $('#mugIcon').addClass('scrolled');
             } else {
                 $('#navbar').removeClass('blurred');
                 $('.nav-link').removeClass('scrolled');
                 $('#mugIcon').removeClass('scrolled');
             }
         }
         //end of function for navbar

       //function for login
        function customerLogin() {
            var username = document.getElementById("customerName").value;
            var password = document.getElementById("customerPassword").value;
            localStorage.setItem('customerName', username);
            console.log('Username: ' + username);
            sessionStorage.setItem('customerName', username);

            if (username == "" && password == "") {
                alertify.error('Empty fields! Please fill all the fields.');
            } else if ( username == ""){
                alertify.error("Empty  Username!");
            } else if(password == ""){
                alertify.error("Empty Password!");
            }else {
                Swal.fire({
                        icon: 'success',
                        title: 'Welcome!',
                        showConfirmButton: false,
                        timer: 2000
                      });
            }
        }



     </script>
</body>
</html>
