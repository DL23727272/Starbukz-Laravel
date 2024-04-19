
<!DOCTYPE html>
<html>
  <head>
    <title>Cart</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="/img/logo.ico">

    <!-- Alertify sakit sa ulo -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <script src="jquery-3.6.1.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
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
    </style>
  </head>
  <body class="">

    @include('components.navigation.navbar')
    @include('components.content.cartContent')
    @include( 'components.footer.footer' )

<script type="text/javascript">
    //For navbar
   window.onscroll = function () { scrollFunction() };

   function scrollFunction() {
     if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
       document.getElementById("navbar").classList.add("blurred");
       const navLinks = document.querySelectorAll(".nav-link");
       navLinks.forEach(link => link.classList.add("scrolled"));
       document.getElementById("mugIcon").classList.add("scrolled");
     } else {
       document.getElementById("navbar").classList.remove("blurred");
       const navLinks = document.querySelectorAll(".nav-link");
       navLinks.forEach(link => link.classList.remove("scrolled"));
       document.getElementById("mugIcon").classList.remove("scrolled");
     }
   }
 //end of function for navbarrr
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
 //fetch the customer order
 $(document).ready(function() {
     // Retrieve customer ID from sessionStorage
     var customerID = sessionStorage.getItem('customerID');
     console.log('Retrieved Customer ID: ' + customerID);


     // Check if customerID is present
     if (customerID) {
         // Send AJAX request to fetch orders for the customer in section orders
         $.ajax({
           url: 'customerOrders.php',
           method: 'GET',
           data: { customerID: customerID },
           success: function(response) {
               $('#orders').html(response);
               // Reload the orders section periodically
               setInterval(function () {
                   $.ajax({
                       url: 'customerOrders.php',
                       method: 'GET',
                       data: { customerID: customerID },
                       success: function(newResponse) {
                           $('#orders').html(newResponse);
                       },
                       error: function(xhr, status, error) {
                           console.error(error);
                       }
                   });
               }, 10000); // 10 seconds reload
           },
           error: function(xhr, status, error) {
               console.error(error);
           }
       });


       // Send AJAX request to fetch total number of orders for the customer
         $.ajax({
             url: 'countOrders.php',
             method: 'GET',
             data: { customerID: customerID }, // Pass customerID to the PHP script
             success: function(totalOrders) {
                 $('#totalOrders').text(totalOrders); // Update the total orders count in the HTML
                 console.log('TOTal Orders: ' + totalOrders); // debug statement
             },
             error: function(xhr, status, error) {
                 console.error(error);
             }
         });

     } else {
         console.log('Customer ID not found in sessionStorage');
     }
 });



  alertify.set('notifier', 'position', 'top-right');
  alertify.set('notifier', 'delay', 5);

  document.addEventListener("DOMContentLoaded", function() {
       var customerID = sessionStorage.getItem('customerID');
       var customerName = sessionStorage.getItem('customerName');
       var cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
       // Check if customerID is present
       if (customerID) {
         document.getElementById('customerID').innerText = 'Customer Name: ' + customerName;
         console.log('Customer ID ' + customerID)
         console.log('Customer Name ' + customerName);
         console.log(cartItems)

       } else {
           console.log('Customer ID not found in sessionStorage');
       }
   });

   // Function to place an order
   function placeOrder() {
    var customerID = sessionStorage.getItem('customerID');
    var cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

    console.log("place order customerID: " + customerID);
    if (customerID && cartItems.length > 0) {
        // Prepare the order data
        var orderData = {
            customerID: customerID,
            items: JSON.stringify(cartItems) // Convert items array to JSON string
        };
        console.log(orderData);
        // Send the order data to the Laravel controller using AJAX
        $.ajax({
            type: "POST",
            url: "/place-order", // Route for storing the order data
            data: orderData,
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Handle the response from the server
                if (response.status === 'success') {
                    // Order placed successfully
                    alertify.success(response.message);
                    // Clear the cart after placing the order
                    localStorage.removeItem("cartItems");
                    // Refresh the page to update the cart display
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                    // Update cartCount to 0
                    localStorage.setItem("cartCount", 0);
                    // Update the cart count in the navbar
                    updateCartCount();
                } else {
                    // Failed to place the order
                    alertify.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                console.error(xhr.responseText);
                alertify.error('Failed to place order. Please try again later.');
            }
        });

    } else {
        // Show an error message if customerID is missing or cart is empty
        alertify.error('Please Login or Cart is empty!');
    }
}



   //END ORDER FUNCTION

   //Para ito for displaying ng cart items
   document.addEventListener("DOMContentLoaded", function () {
       const displayCartItems = () => {
           var cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

           var cartTableBody = document.getElementById("cartTableBody");
           var cartStatus = document.getElementById("cartStatus");
           var totalAmountElement = document.getElementById("totalAmount");

           cartTableBody.innerHTML = "";
           var totalAmount = 0;
           var totalItems = 0;

           // Iterate sa each cart item and append to the table
           cartItems.forEach(function (item, index) {
               // Handle null or undefined total values
               var total = item.total || 0;

               if (cartItems.length === 0) {
                   cartStatus.style.display = "block";
               } else {
                   cartStatus.style.display = "none";
                   var row = "<tr>" +
                       "<td>" + item.productName + "</td>" +
                       "<td>" + item.quantity + "</td>" +
                       "<td>" + total.toFixed(2) + "</td>" +
                       "<td><button class='btn btn-outline-danger cancel-btn' onclick='cancelItem(" + index + ")'>Cancel</button></td>" +
                       "</tr>";

                   // Append the row to the table body
                   cartTableBody.innerHTML += row;

                   // Update the totalAmount variable with the current item's total
                   totalAmount += total;

                   totalItems += item.quantity;
               }
           });

           // Update the total amount and total items displayed on the page
           document.getElementById("totalAmount").innerText = "Php " + totalAmount.toFixed(2);

           document.getElementById("totalItems").innerText = totalItems;
       };

       // Call the displayCartItems function when the page loads
       displayCartItems();
   });

   //Cancel function on my cart
   function cancelItem(index) {

         alertify.success('Item canceled successfully!');

         // Retrieve the cart items from localStorage
         var cartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

         setTimeout(function () {
                     location.reload();
         }, 1000);

         // Check if the index is valid
         if (index >= 0 && index < cartItems.length) {
             // Update the cart count by subtracting the quantity of the canceled item
             var canceledItemQuantity = cartItems[index].quantity;
             var totalCount = parseInt(localStorage.getItem("cartCount")) || 0;
             totalCount -= canceledItemQuantity;
             localStorage.setItem("cartCount", totalCount);

             // Remove the item at the specified index from the array
             cartItems.splice(index, 1);

             // Update localStorage with the modified cartItems array
             localStorage.setItem("cartItems", JSON.stringify(cartItems));

             // Call the function to refresh the displayed cart items
             displayCartItems();

             // Update the cart count in the navbar
             updateCartCount();


             if (window.location.pathname.includes('home.html')) {
                 // Retrieve the cartCount element from home.html and update its value
                 var cartCountElement = document.getElementById('cartCount');
                 if (cartCountElement) {
                     cartCountElement.innerText = totalCount;
                 }
             }

         } else {
             // Show an error message if the index is out of bounds
             alertify.error('Invalid index for canceling item!');
         }
     }



</script>

</body>
</html>
