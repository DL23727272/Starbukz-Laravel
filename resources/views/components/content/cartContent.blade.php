@section('cartContent')
    <!--Cart-->
    <section class="container-sm mt-5">
        <h5  id="customerID"></h5>
        <h2>Your Cart: <b id="totalItems"></b> items</h2>
        <span id="cartStatus" class="lead badge text-bg-warning">
          Please select a product</span
        >

        <table class="table">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="cartTableBody"></tbody>
        </table>
        <div class="row">
          <div class="col-md-6 px-4">
              <h5>Total Amount: <span id="totalAmount">₱0.00</span></h5>
          </div>
          <div class="col-md-6 text-end">
              <button class="btn btn-outline-dark" onclick="placeOrder()">Place Order</button>
          </div>

      </div>
      </section>
      <!---end Cart-->

      <hr class="container-sm Sborder border-success mt-5 border-2 opacity-50" />

      <!-- ORDER CONTENT -->
      <section class="container-sm mt-5">
        <h2>Your Orders: <b id="totalOrders"></b> </h2>
        <div class="container-sm">
          <div id="orders">

          </div>
        </div>
      </section>
      <!-- END OF ORDER CONTENT -->

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
