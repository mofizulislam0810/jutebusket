 <!-- Footer -->
 <footer class="text-center text-white" style="background-color: #0a4275;">
     <!-- Grid container -->
     <div class="container p-4 pb-0">
         <!-- Section: CTA -->
         <section class="">
             <p class="d-flex justify-content-center align-items-center">
                 <span class="me-3">Register for free</span>
                 <button type="button" class="btn btn-outline-light btn-rounded">
                     Sign up!
                 </button>
             </p>
         </section>
         <!-- Section: CTA -->
     </div>
     <!-- Grid container -->

     <!-- Copyright -->
     <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
         © 2020 Copyright:
         <a class="text-white" style="text-decoration:none" href="index.php">JUTE BUSKET</a>
     </div>
     <!-- Copyright -->
 </footer>
 <!-- Footer -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
 </script>
 <script src="https://code.jquery.com/jquery-2.2.4.min.js"
     integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
 <script src="js/move-top.js"></script>
 <script src="js/easing.js"></script>

 <!-- smooth-scrolling-of-move-up -->
 <script>
$(document).ready(function() {
    $().UItoTop({
        easingType: 'easeOutQuart'
    });
});
 </script>
 <!-- smooth-scrolling-of-move-up -->
 <script>
$(document).ready(function() {
    $(".addItemBtn").click(function(e) {
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var pid = $form.find(".p_id").val();
        var pname = $form.find(".p_name").val();
        var pprice = $form.find(".p_price").val();
        var pimage = $form.find(".p_image").val();
        var pcode = $form.find(".p_code").val();
        var user_name = $form.find(".user_name").val();
        var user_email = $form.find(".user_email").val();
        $.ajax({
            url: 'action.php',
            method: 'POST',
            data: {
                pid: pid,
                pname: pname,
                pprice: pprice,
                pimage: pimage,
                pcode: pcode,
                username: user_name,
                useremail: user_email
            },
            success: function(response) {
                $("#message").html(response);
                window.scrollTo(0, 0);
                load_cart_item_number();
            }
        });
    });
    load_cart_item_number();

    function load_cart_item_number() {
        $.ajax({
            url: 'action.php',
            method: 'GET',
            data: {
                cartItem: "cart_item"
            },
            success: function(response) {
                $("#cart-item").html(response);
            }
        });
    };
})
 </script>
 <script>
$(document).ready(function() {
    $(".itemQty").on('change', function() {
        var $el = $(this).closest('tr');
        var pid = $el.find(".pid").val();
        var pprice = $el.find(".pprice").val();
        var qty = $el.find(".itemQty").val();
        location.reload(true);
        $.ajax({
            url: 'action.php',
            method: 'post',
            cache: false,
            data: {
                qty: qty,
                p_id: pid,
                pprice: pprice
            },
            success: function(response) {
                console.log(response);
            }
        });
    });
    load_cart_item_number();

    function load_cart_item_number() {
        $.ajax({
            url: 'action.php',
            method: 'get',
            data: {
                cartItem: "cart_item"
            },
            success: function(response) {
                $("#cart-item").html(response);
            }
        });
    }
});
 </script>
 <script>
$(document).ready(function() {

    $("#placeorder").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'action.php',
            method: 'post',
            data: $('form').serialize() + "&action=order",
            success: function(response) {
                $("#order").html(response);
            }
        });
    });
    load_cart_item_number();

    function load_cart_item_number() {
        $.ajax({
            url: 'action.php',
            method: 'get',
            data: {
                cartItem: "cart_item"
            },
            success: function(response) {
                $("#cart-item").html(response);
            }
        });
    }
});
 </script>
 </body>

 </html>