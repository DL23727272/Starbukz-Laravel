<!-- PROPER INDENTATION BY DL -->

  <!---ADD  PRODUCT MODAL--->
  <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content "  style="background: rgba(255, 255, 255, 0.449);  backdrop-filter: blur(10px); ">
            <div class="modal-header custom-modal ">
                <div class="col-sm">
                <img src="{{ asset('assets/img/hero.png') }} alt="" style="width: 200px; ">
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container align-items-center justify-content-center DL" >
                <div class="row ">
                    <div class="col-sm content">
                        <div class="w-100"></div>
                        <br>
                        <div class="col-sm">
                            <h1 class="font-weight-bold text-light" style="font-size: 20px;">Add Product</h1>
                        </div>
                        <br>
                        <form enctype="multipart/form-data" method="POST">
                            <div class="form-group my-2">
                                <input type="text" name="productName" id="productName" placeholder="Enter Product Name" class="form-control" required>
                            </div>
                            <div class="form-group my-2">
                                <input type="text" name="productPrice" id="productPrice" placeholder="Enter Product Price" class="form-control" required>
                            </div>
                            <div class="form-group my-2">
                                <textarea  type="text" name="productDescription" id="productDescription" placeholder="Enter Product Description" class="form-control" required></textarea>
                            </div>
                            <div class="form-group my-2">
                            <input type="file" name="image" id="productImageName" placeholder="Enter Product Image Name" class="form-control" required>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-auto">
                                    <button type="button" id="addProductButton" class="btn btn-outline-light">Submit</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End modal-->


<!---Modal Product-->
<div class="modal" tabindex="-1" id="modalProduct" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fruitname"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="Xclose">

                </button>
            </div>
            <div class="modal-body">

                <img src="" id="fruitimage" alt="" />

                <hr class="border-success border-2"/>
                <h4 class="card-title" id="fruitname"></h4>
                <p class="card-text" id="fruitdetail"></p>
                <p class="card-text" id="fruitprice"></p>
                <div class="d-flex gap-2">
                    <button class="btn btn-warning" id="decrement">-</button>
                        <input class="form-control w-25 text-center text-secondary" id="quantity" value="0"></p>
                    <button class="btn btn-warning" id="increment">+</button>
                </div>
                <div class="d-flex align-items-center mt-3">Total:
                    <input class="form-control border-0 bg-transparent text-secondary" id="total" disabled/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">
                  Close
                </button>

                <button  type="button"  class="btn text-white"  style="background-color: #006341"   id="buy" data-bs-dismiss="modal"
                 >
                  Add to cart
                </button>
            </div>
        </div>
    </div>
</div>
<!---End Modal-->


  <!---Signup   MODAL--->
    <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: rgba(255, 255, 255, 0.449);  backdrop-filter: blur(10px); ">
                <div class="modal-header">
                    <img src="{{ asset('assets/img/hero.png') }}" alt="" style="width: 200px; ">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="POST" class="mt-1" id="signupForm">
                        @csrf
                        <div class="m-5">
                            <div class="form-group my-4">
                                <label for="email" style="font-weight: 700;"><i class="fa-solid fa-envelope"></i> Email</label>
                                <input type="email" name="customerSignUpEmail" id="customerSignUpEmail" placeholder="Enter Email" class=" form-control" required>
                            </div>
                            <div class="form-group my-4">
                                <label for="Name" style="font-weight: 700;"><i class="fa-solid fa-signature"></i> Username</label>
                                <input type="text" name="customerSignUpName" id="customerSignUpName" placeholder="Enter Username" class=" form-control" required>
                            </div>
                            <div class="form-group my-4">
                                <label for="pass" style="font-weight: 700;"><i class="fa-solid fa-lock"></i> Password</label>
                                <input type="password" name="customerSignUpPassword" id="customerSignUpPassword" placeholder="Enter Password" class=" form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="PhoneNumber" style="font-weight: 700;" class="form-label"><i class="fa-solid fa-phone"></i> Phone Number</label>
                                <input type="number" class="form-control" id="customerPhoneNumber" name="customerPhoneNumber" placeholder="Enter a phone number">
                            </div>
                            <div class="mb-3">
                                <label for="Address" style="font-weight: 700;" class="form-label"><i class="fa-solid fa-location-dot"></i> Address</label>
                                <textarea class="form-control" id="customerAddress" name="customerAddress" placeholder="Enter your address"></textarea>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="Signup()">Signup</button>
                </div>
            </div>
        </div>
    </div>

<!--End modal-->
