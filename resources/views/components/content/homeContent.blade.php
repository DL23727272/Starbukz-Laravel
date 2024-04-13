@section('content')
 <!-- MODAL ADD ITEMS -->
 <div id="modalContainer"></div>
 <!-- END MODAL ADD ITEMSSSSSSSS -->


 <!--Banner-->
 <div>
   <div class="position-relative">
     <img
       src="{{ asset('assets/img/banner.jpg') }}"
       class="w-100 img-fluid"
       style="
         height: 50vh;
         object-fit: cover;
         filter: blur(2px);
         filter: saturate(2);
       "
     />
     <section
       class="position-absolute top-50 start-50 translate-middle text-center text-white"
     >
       <h1 class="text-white h1">Starbucks</h1>
       <p class="lead fst-italic h4">
         <i class="fa-solid fa-quote-left"></i> Find Your Perfect Sip at
         Starbucks! <i class="fa-solid fa-quote-right"></i>
       </p>
       <button class="btn text-white shadow" style="background-color: #006341; transition: background-color 0.3s;"
               onmouseover="this.style.backgroundColor='#004f2d'"
               onmouseout="this.style.backgroundColor='#006341'">

         <a href="#content" style="text-decoration: none; color: white;">
           <i class="fa-solid fa-mug-hot"></i> Order Now
         </a>

       </button>
     </section>
   </div>
 </div>
 <!--End Banner-->

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
         <a href="#content">
           <img id="bottom" src="{{ asset('assets/img/thumb1.png') }}" onmouseover="imgSlider('{{ asset('assets/img/img1.png') }}');" />
         </a>
         <a href="#content">
           <img src="{{ asset('assets/img/thumb2.png') }}" onmouseover="imgSlider('{{ asset('assets/img/img2.png') }}');" />
         </a>
         <a href="#content">
           <img src="{{ asset('assets/img/thumb3.png') }}" onmouseover="imgSlider('{{ asset('assets/img/img3.png') }}');" />
         </a>
         <a href="#content">
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

 <section class="mt-5">
   <div class="container-sm">
     <div class="row justify-content-center">
       <div class="col-12 text-center">
         <h1 class="fst-italic">Our Products</h1>
       </div>
     </div>
     <div class=" w-100" id="content">
        {!! $output !!}
     </div>
   </div>
 </section>

