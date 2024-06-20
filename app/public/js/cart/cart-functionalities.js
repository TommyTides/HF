function add_product($id, $price) {
  let $quantity = 1;
  // Check if an input exists
  let $input = document.getElementById("input-quantity-" + $id);

  if ($input != null) {
    $quantity = $input.value;
  }

  $.ajax({
    url: "/cart/addtocart",
    data: {
      product_id: $id,
      product_price: $price,
      product_quantity: $quantity,
    },
    success: function (reply) {
      console.log(reply);
    },
    error: function (req, status, error) {
      console.log("Something went wrong: ", status, error, req);
    },
  });
}

function edit_product($id, $quantity) {
  $.ajax({
    url: "/cart/editcart",
    data: { product_id: $id, product_quantity: $quantity },
    success: function (reply) {
      let $reply = JSON.parse(reply);

      // Adjust values
      document.getElementById("subtotal").textContent =
        "\u20AC " + $reply["subTotal"].toFixed(2);
      document.getElementById("total").textContent =
        "\u20AC " + $reply["total"].toFixed(2);

      if ($reply.deleteProduct) {
        const $product = document.getElementById("product-" + $id);
        $product.remove();
      }

      if ($reply.cartEmpty === true) {
        // Disable checkout
        if (
          !document.getElementById("summary").classList.contains("collapse")
        ) {
          document.getElementById("summary").classList.add("collapse");
          document.getElementById("clearcartbtn").classList.add("collapse");
        }

        // Display message
        document
          .getElementById("items")
          .insertAdjacentHTML(
            "afterbegin",
            "<h5>Your cart is currently empty.</h5>" +
              '<a href="/" class="btn btn-danger text-white btn-lg btn-block">' +
              "Browse products</a>"
          );
      }

        check_enough_seats();
    },
    error: function (req, status, error) {
      console.log("Something went wrong: ", status, error, req);
    },
  });
}

function addToCartFromHistory(event) {
    event.preventDefault();
    let ticketType = document.getElementById("ticketTypeSelector").value;
    let date = document.getElementById("dateSelector").value;
    let time = document.getElementById("timeSelector").value;
    let language = document.getElementById("languageSelector").value;
    console.log("inside the add to cart history!!!")

   
    $.ajax({
        url: "/history/getticketidfromdb",
        type: "POST",
        data: {
            ticketTypeSelectors: ticketType,
            dateSelectors: date,
            timeSelectors: time,
            languageSelectors: language,
        },
        success: function (reply) {
            let result = JSON.parse(reply);
            console.log(result);

            let productId = result.product_id;
            let price = result.price_exc_vat;
            add_product(productId, price);
        },

        error: function (req, status, error) {
            console.log("Something went wrong: ", status, error, req);
        }
    });
}

function clear_cart() {
    $.ajax({
        url: "/cart/emptycart",
        success: function (reply) {
        console.log(reply);
        location.reload();
        },
        error: function (req, status, error) {
        console.log("Something went wrong: ", status, error, req);
        },
    });
}

function check_enough_seats() {
    $.ajax({
        url: "/cart/checkAmountSeats",
        success: function (reply) {
            let result = JSON.parse(reply);

            if (result === false) {
                document.getElementById("checkoutbtn").classList.add("collapse");
                document.getElementById("checkoutwarning").classList.remove("collapse");
            }
            else {
                document.getElementById("checkoutbtn").classList.remove("collapse");
                document.getElementById("checkoutwarning").classList.add("collapse");
            }
        }
    })
}