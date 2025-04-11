<?php
session_start();

$cart = $_SESSION['cart'] ?? [];
$total_price = array_reduce($cart, fn($sum, $item) => $sum + $item['price'], 0);
$vat = $total_price * 0.21;
$total_price_with_vat = $total_price + $vat;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Balenci Webshop</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="style.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <style>
    .row {
      display: -ms-flexbox;
      /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap;
      /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
      justify-content: space-between;
    }

    .col-small {
      -ms-flex: 25%;
      /* IE10 */
      flex: 25%;
    }

    .col-contact {
      -ms-flex: 50%;
      /* IE10 */
      flex: 50%;
    }

    .col-country {
      -ms-flex: 50%;
      /* IE10 */
      flex: 50%;
    }

    .col-large {
      -ms-flex: 75%;
      /* IE10 */
      flex: 75%;
    }

    .col-small,
    .col-contact,
    .col-country,
    .col-large {
      padding: 0 16px;
    }

    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }

    .container-secondary {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
      margin-top: 20px;
    }

    input[type="text"] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #04aa6d;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      color: #2196f3;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: grey;
    }

    /* Responsive layout for smaller screens */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }

      .col-small {
        margin-bottom: 20px;
      }
    }

    .form-group {
      display: flex;
      flex-direction: column;
      margin-bottom: 15px;
    }

    .form-group label {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input,
    .form-group select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      width: 100%;
    }

    .form-row {
      display: flex;
      justify-content: space-between;
      gap: 15px;
    }

    .form-row .form-group {
      flex: 1;
    }

    .form-container {
      max-width: 800px;
      margin: 0 auto;
    }

    .form-container h3 {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

  <script>
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
      scrollFunction();
    };

    function scrollFunction() {
      if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
      ) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }

    // Update cart count
    let cartCount = 0;

    function addToCart() {
      cartCount++;
      document.getElementById("cart-count").innerText = cartCount;
      updateSecondaryContainer();
    }

    function updateSecondaryContainer() {
      const secondaryContainer = document.querySelector(".container-secondary");
      secondaryContainer.innerHTML = `
        <h3>Additional Information</h3>
        <p>Items in cart: ${cartCount}</p>
      `;
    }
  </script>

  <?php include 'includes/header.php'; ?>

  <div class="navbar">
    <a href="index.php">Home</a>
    <a href="#">Clothes</a>
    <a href="#">Shoes</a>
    <a href="#">Accessories</a>
    <a href="persoonsgegevens.php" class="right"><i class="fa fa-shopping-cart"></i> Shopping Cart (<span
        id="cart-count">0</span>)</a>

    <!-- The form -->
    <form class="example" action="action_page.php">
      <!-- <input type="text" placeholder="Search.." name="search" />
      <button type="submit"><i class="fa fa-search"></i></button> -->
    </form>
  </div>

  <div class="row">


    <div class="main" style="flex: 100%; align-items: center; justify-content: center;">

      <!-- hier komt de persoonsgegevens pagina -->


      <div class="row">
        <div class="col-large">
          <div class="container form-container">
            <form action="/action_page.php">
              <h3>Your Contacts</h3>
              <div class="form-group">
                <label for="fname">Firstname</label>
                <input type="text" id="fname" name="firstname" required />
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="infix">Infix</label>
                  <input type="text" id="infix" name="infix" />
                </div>
                <div class="form-group">
                  <label for="adr">Lastname</label>
                  <input type="text" id="adr" name="address" required />
                </div>
              </div>

              <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" />
              </div>

              <div class="form-row">
                <div class="form-group">
                  <label for="housenumber">House number</label>
                  <input type="text" id="housenumber" name="housenumber" required />
                </div>
                <div class="form-group">
                  <label for="post">Postal code</label>
                  <input type="text" id="post" name="post" required />
                </div>
              </div>

              <div class="form-group">
                <label for="country">Country</label>
                <select id="country" name="country" required>
                  <option value="Netherlands">Netherlands</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Germany">Germany</option>
                  <option value="United States">United States</option>
                  <option value="United Kingdom">United Kindom (UK)</option>
                </select>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required />
              </div>

              <div class="form-group">
                <label for="tel">Mobile Number</label>
                <input type="tel" id="phone" name="phone" placeholder="+31 6 12345678" pattern="^\+?[0-9\s\-]{7,15}$" required />
              </div>

              <div class="form-group">
                <label for="dob">Date of birth</label>
                <div class="form-row">
                  <div class="form-group">
                    <select id="dob-day" name="dob-day">
                      <option value="">Day</option>
                      <!-- Generate day options dynamically -->
                      <script>
                        for (let i = 1; i <= 31; i++) {
                          document.write('<option value="' + i + '">' + i + "</option>");
                        }
                      </script>
                    </select>
                  </div>
                  <div class="form-group">
                    <select id="dob-month" name="dob-month">
                      <option value="">Month</option>
                      <option value="1">January</option>
                      <option value="2">February</option>
                      <option value="3">March</option>
                      <option value="4">April</option>
                      <option value="5">May</option>
                      <option value="6">June</option>
                      <option value="7">July</option>
                      <option value="8">August</option>
                      <option value="9">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select id="dob-year" name="dob-year">
                      <option value="">Year</option>
                      <!-- Generate year options dynamically -->
                      <script>
                        const currentYear = new Date().getFullYear();
                        for (let i = currentYear; i >= 1900; i--) {
                          document.write('<option value="' + i + '">' + i + "</option>");
                        }
                      </script>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>
                  General terms and conditions
                  <input type="checkbox" checked="checked" name="gtc" style="margin-left: 10px;" />
                </label>
              </div>

              <input type="submit" value="Continue to checkout" class="btn" />
            </form>
          </div>
        </div>
        <div class="col-large">
          <div class="container-secondary">
            <h3>Uw Winkelmandje</h3>
            <?php if (empty($cart)) { ?>
              <p>Uw winkelmandje is leeg.</p>
            <?php } else { ?>
              <ul>
                <?php foreach ($cart as $item) { ?>
                  <li>
                    <strong><?= htmlspecialchars($item['title'] ?? 'Unknown Title') ?></strong> -
                    Maat: <?= htmlspecialchars($item['size'] ?? 'Unknown Size') ?> -
                    Prijs: €<?= htmlspecialchars($item['price'] ?? '0.00') ?>
                  </li>
                <?php } ?>
              </ul>
              <div class="cart-total" style="margin-top: 20px; font-size: 1.2rem; font-weight: bold;">
                Totale Prijs (excl. BTW): €<?= htmlspecialchars($total_price) ?><br>
                BTW (21%): €<?= htmlspecialchars($vat) ?><br>
                Totale Prijs (incl. BTW): €<?= htmlspecialchars($total_price_with_vat) ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

 

  <?php include 'includes/footer.php'; ?>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&family=Gruppo&display=swap"
    rel="stylesheet" />


</body>
<script>
  function displayCart() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const cartContainer = document.getElementById("cart-container");
    const cartSummary = document.getElementById("cart-summary");
    cartContainer.innerHTML = "";
    cartSummary.innerHTML = "";

    if (cart.length === 0) {
      cartContainer.innerHTML = "<p>Your cart is empty.</p>";
      return;
    }

    let totalOrderPrice = 0;
    let totalVAT = 0;

    cart.forEach((product, index) => {
      const productTotalPrice = product.price * product.quantity;
      totalOrderPrice += productTotalPrice;

      const productElement = document.createElement("div");
      productElement.className = "cart-item";
      productElement.innerHTML = `
        <h3>${product.name}</h3>
        <p>Unit Price: $${product.price.toFixed(2)}</p>
        <p>Quantity: ${product.quantity}</p>
        <p>Total Price: $${productTotalPrice.toFixed(2)}</p>
        <button onclick="removeFromCart(${index})">Remove</button>
      `;
      cartContainer.appendChild(productElement);
    });

    totalVAT = totalOrderPrice / 121 * 100;

    cartSummary.innerHTML = `
      <h3>Order Summary</h3>
      <p>Total Order Price (Excl. BTW): $${totalVAT.toFixed(2)}</p>
      <p>BTW (21%): $${(totalOrderPrice - totalVAT).toFixed(2)}</p>
      <p>Total Order Price (Incl. BTW): $${totalOrderPrice.toFixed(2)}</p>
    `;
  }

  function clearCart() {
    localStorage.removeItem("cart");
    displayCart();
  }

  function removeFromCart(index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    displayCart();
  }

  // window.onload = displayCart;
</script>

<script>
  var slider = document.getElementById("myRange");
  var output = document.getElementById("demo");
  output.innerHTML = slider.value;

  slider.oninput = function() {
    output.innerHTML = this.value;
  };

  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  function addToCart(productName, productPrice, productBrand, productSizes, productId) {
    winkelWagenAdd();
    const product = {
      name: productName,
      price: productPrice,
      quantity: 1,
      brand: productBrand,
      sizes: productSizes,
      id: productId,
    };

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'xhr_addtocart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    xhr.onload = function() {
      console.log(this.responseText);
    };
    xhr.send(JSON.stringify(product));

    const existingProduct = cart.find(item => item.id === productId);
    if (existingProduct) {
      existingProduct.quantity += 1;
    } else {
      cart.push(product);
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    console.log(cart);
    alert(`${productName} has been added to your cart.`);
  }
</script>

</html>