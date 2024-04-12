<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Alertify -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/img/logo.ico">
      <!--
        You may not copy, reproduce, distribute, publish, display, perform, modify, create derivative works, transmit,
        or in any way exploit any such content, nor may you distribute any part of this content over any network, including a local area network,
        sell or offer it for sale, or use such content to construct any kind of database. You may not alter or remove any copyright or
        other notice from copies of the content on AI Tech’s website.
      -->
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
      #mugIcon {
        color: white;
        transition: color 0.3s ease;
      }

      #mugIcon.scrolled {
        color: #000000;
      }
      #fruitimage {
        max-width: 100%;
        max-height: 300px;
    }
    </style>
  </head>
<body>

    @include('components.navigation.navbar')
    @include('components.content.homeContent')
    @include( 'components.footer.footer' )



<script type="text/javascript">

//For navbar
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("navbar").classList.add("blurred");
    const navLinks = document.querySelectorAll(".nav-link");
    navLinks.forEach(link => link.classList.add("scrolled"));
    document.getElementById("mugIcon").classList.add("scrolled"); // Add scrolled class to the icon
    } else {
    document.getElementById("navbar").classList.remove("blurred");
    const navLinks = document.querySelectorAll(".nav-link");
    navLinks.forEach(link => link.classList.remove("scrolled"));
    document.getElementById("mugIcon").classList.remove("scrolled"); // Remove scrolled class from the icon
    }
}
//end of function for navbarrr

// For carousel na nag chachange image
function imgSlider(anything){
    document.querySelector('.starbucks').src = anything;
}

alertify.set('notifier', 'position', 'top-right');
alertify.set('notifier', 'delay', 5);


// Function to update cart count sa navbar
function updateCartCount() {
    var cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
    var totalCount = 0;

    cartItems.forEach(function(item) {
        totalCount += item.quantity;
    });

    // Update the cart count in the HTML
    document.getElementById('cartCount').innerText = totalCount;

    // Store the cart count in local storage
    localStorage.setItem("cartCount", totalCount);
}

function displayCartCount() {
    var totalCount = localStorage.getItem("cartCount") || 0;
    document.getElementById('cartCount').innerText = totalCount;
}

displayCartCount();

//  $(document).ready(function () {
window.onload = function (){
    $('#modalContainer').load('{{ route("modal") }}');

    $('#total').hide()
    $(".addtocart").click(function () {

        var productId = $(this).data("product-id");
        var productName = $(this).data("product-name");
        var productImage = $(this).data("product-image");
        var productDetail = $(this).data("product-detail");
        var productPrice = $(this).data("product-price");

        //ayaw magpakita yung picture sa modal
        console.log("Product Image URL:", productImage);
        console.log("Product ID:", productId);
        console.log("Product Name:", productName);
        console.log("Product Image:", productImage);
        console.log("Product Detail:", productDetail);
        console.log("Product Price:", productPrice);

        $("#modalProduct #fruitname").text(productName);
        $("#modalProduct #fruitprice").text("Php " + productPrice);
        $("#modalProduct #fruitdetail").text(productDetail);
        $("#modalProduct #fruitimage").attr("src", "{{ asset('assets/products/') }}/" + productImage);

        //FUnction for Increment Button on MOdal product
        $("#increment").click(function () {
            let quantity = parseInt($("#quantity").val());
            quantity += 1;
            $("#quantity").val(quantity);
            $('#total').show();
            $('#total').val(productPrice * quantity);
        });

        //FUnction for Decrement Button on MOdal product
        $("#decrement").click(function () {
            let quantity = parseInt($("#quantity").val());
            if (quantity > 0) {
                quantity -= 1;
                $("#quantity").val(quantity);
                $('#total').show();
                $('#total').val(productPrice * quantity);
            }
        });

        $('#close').click(function(){
        $('#quantity').val(0);
        $('#total').hide()

        //mahirap na bug requires modern solution reload para di mag double yung Qt sa modal
        setTimeout(function () {
            location.reload();
        }, 10);
        });
        $('#Xclose').click(function(){
        $('#quantity').val(0);
        $('#total').hide()

        //mahirap na bug requires modern solution reload para di mag double yung Qt sa modal
        setTimeout(function () {
            location.reload();
        }, 10);
        });

        $('#buy').click(function () {
            alertify.success('Item added to cart!');

            var quantity = parseInt($("#quantity").val());
            var total = productPrice * quantity;

            var cartItem = {
                productId: productId, // Use the productId variable
                productName: productName,
                productPrice: productPrice,
                quantity: quantity,
                total: total
            };

            // Store the cart item in localStorage
            var cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
            cartItems.push(cartItem);
            localStorage.setItem("cartItems", JSON.stringify(cartItems));

            // Clear the quantity after adding to cart
            $("#quantity").val(0);

            // Reload the page after a delay (e.g., 2000 milliseconds = 2 seconds)
            setTimeout(function () {
                location.reload();
            }, 2000);
            updateCartCount();
        });


        // Function to display cart items
        function displayCartItems() {
            var cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
            var cartOutput = "Product Name\tQuantity\tTotal\n";
        }

        // Display cart items when the page loads
        displayCartItems();


    });
}





</script>
  </body>
</html>
