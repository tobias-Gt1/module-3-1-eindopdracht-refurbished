<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <style>
      body {
        font-family: Arial;
        font-size: 17px;
        padding: 8px;
      }

      * {
        box-sizing: border-box;
      }

      .row {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
      }

      .col-25 {
        -ms-flex: 25%; /* IE10 */
        flex: 25%;
      }

      .col-50 {
        -ms-flex: 50%; /* IE10 */
        flex: 50%;
      }

      .col-75 {
        -ms-flex: 75%; /* IE10 */
        flex: 75%;
      }

      .col-25,
      .col-50,
      .col-75 {
        padding: 0 16px;
      }

      .container {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
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

      /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
      @media (max-width: 800px) {
        .row {
          flex-direction: column-reverse;
        }
        .col-25 {
          margin-bottom: 20px;
        }
      }
    </style>
  </head>
  <body>
    <div class="row">
      <div class="col-75">
        <div class="container">
          <form action="/action_page.php">
            <div class="row">
              <div class="col-50">
                <h3>Your Contacts</h3>
                <label for="fname"><i class="fa fa-user"></i> Firstname</label>
                <input type="text" id="fname" name="firstname" required />

                <div class="row">
                  <div class="col-50">
                    <label for="email"
                      ><i class=></i> Infix</label
                    >
                    <input type="text" id="email" name="email" />
                  </div>
                  <div class="col-50">
                    <label for="adr"
                      ><i class="fa fa-address-card-o"></i> Lastname</label
                    >
                    <input type="text" id="adr" name="address" required />
                  </div>
                </div>

                <label for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city" />

                <div class="row">
                  <div class="col-50">
                    <label for="state">House number</label>
                    <input type="text" id="state" name="state" required />
                  </div>
                  <div class="col-50">
                    <label for="zip">Postal code</label>
                    <input type="text" id="zip" name="zip" required />
                  </div>
                </div>
              </div>

              <div class="col-50">
                <label for="cname">Country</label>
                <input type="text" id="cname" name="cardname" required />
                <label for="ccnum">Email</label>
                <input type="text" id="ccnum" name="cardnumber" required />
                <label for="expmonth">Mobile Number</label>
                <input type="text" id="expmonth" name="expmonth" required />
                <div class="row">
                  <div class="col-50">
                    <label for="dob">Date of birth</label>
                    <div class="row">
                      <div class="col-33">
                        <select id="dob-day" name="dob-day">
                          <option value="">Day</option>
                          <!-- Generate day options dynamically -->
                          <script>
                            for (let i = 1; i <= 31; i++) {
                              document.write(
                                '<option value="' + i + '">' + i + "</option>"
                              );
                            }
                          </script>
                        </select>
                      </div>
                      <div class="col-33">
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
                      <div class="col-33">
                        <select id="dob-year" name="dob-year">
                          <option value="">Year</option>
                          <!-- Generate year options dynamically -->
                          <script>
                            const currentYear = new Date().getFullYear();
                            for (let i = currentYear; i >= 1900; i--) {
                              document.write(
                                '<option value="' + i + '">' + i + "</option>"
                              );
                            }
                          </script>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <label>
              <input type="checkbox" checked="checked" name="gtc" /> General
              terms and conditions
            </label>
            <input type="submit" value="Continue to checkout" class="btn" />
          </form>
        </div>
      </div>
      <div class="col-25">
        <div class="container">
          <h4>
            Cart
            <span class="price" style="color: black"
              ><i class="fa fa-shopping-cart"></i> <b>4</b></span
            >
          </h4>
          <p><a href="#">Product 1</a> <span class="price">$-</span></p>
          <p><a href="#">Product 2</a> <span class="price">$-</span></p>
          <p><a href="#">Product 3</a> <span class="price">$-</span></p>
          <p><a href="#">Product 4</a> <span class="price">$-</span></p>
          <hr />
          <p>
            Total <span class="price" style="color: black"><b>$-</b></span>
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
