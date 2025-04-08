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
      display: flex;
      flex-wrap: nowrap;
    }

    .side {
      flex: 1;
      max-width: 250px;
    }

    .main {
      flex: 3;
      padding: 20px;
    }
  </style>
</head>

<body>
  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

  <script>
    // Scroll to top button functionality
    let mybutton = document.getElementById("myBtn");

    window.onscroll = function() {
      scrollFunction();
    };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }

    // Price slider functionality
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
      output.innerHTML = this.value;
    };

    // Cart functionality
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    function addToCart(productName, productPrice, productBrand, productSizes, productid) {
      const product = {
        name: productName,
        price: productPrice,
        quantity: 1,
        brand: productBrand,
        sizes: productSizes,
        id: productid,
      };

      // Send product data to the server
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'xhr_addtocart.php');
      xhr.onload = function() {
        console.log(this.responseText);
      };
      const data = JSON.stringify(product);
      const formData = new FormData();
      formData.append('product', data);
      xhr.send(formData);

      // Update cart in localStorage
      const existingProduct = cart.find(item => item.name === productName);
      if (existingProduct) {
        existingProduct.quantity += 1;
      } else {
        cart.push(product);
      }
      localStorage.setItem('cart', JSON.stringify(cart));

      // Update UI
      console.log(cart);
      alert(`${productName} has been added to your cart.`);
      document.getElementById("ordered-product-id").innerText = productid;
    }
  </script>

  <?php include 'includes/header.php'; ?>


  <?php include 'includes/navbar.php'; ?>


  <div class="row">
    <div class="side">
      <h1>Filter</h1>
      <label class="container">Men
        <input type="checkbox" checked="checked" />
      </label>
      <label class="container">Woman
        <input type="checkbox" />
      </label>
      <label class="container">Unisex
        <input type="checkbox" />
      </label>
      <label class="container">Children
        <input type="checkbox" />
      </label>

      <h1>Price slider</h1>

      <div class="slidecontainer">
        <input
          type="range"
          min="1"
          max="1000"
          value=""
          class="slider"
          id="myRange" />
        <p>Amount €: <span id="demo"></span></p>
      </div>

      <h1>Recent bekeken items</h1>
      <div class="recent-items">
        <div class="recent-item">
          <a href="product1.html">
            <img
              src="https://www.net-a-porter.com/variants/images/1647597349791143/in/w460_q60.jpg"
              width="100"
              alt="Product 1" />
          </a>
          <p>Product 1</p>
        </div>
        <div class="recent-item">
          <a href="product2.html">
            <img
              src="https://www.net-a-porter.com/variants/images/1647597345243354/in/w460_q60.jpg"
              width="100"
              alt="Product 2" />
          </a>
          <p>Product 2</p>
        </div>
        <!-- Voeg meer recent bekeken items toe zoals nodig -->
      </div>
    </div>

    <div class="main">
      <?php include 'includes/products1.php'; ?>

      <!-- Persoongegevens Section -->
      <div class="persoongegevens">
        <h2>Persoongegevens</h2>
        <table>
          <tr>
            <th>Product ID</th>
          </tr>
          <tr>
            <td id="ordered-product-id">None</td>
          </tr>
        </table>
      </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&family=Gruppo&display=swap"
      rel="stylesheet" />
</body>

</html>