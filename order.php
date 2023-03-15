<?php
session_start();
require_once 'verify.php';
require_once 'order_functions.php';

$summary = order_summary(400, 1000);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Product</title>
    <div class="nav_container">
        <nav class="navbar">
            <h1 class="navtxt">ShopEase</h1>
            <li><a href="index.php">Home</a></li>
            <li><a href="cart.php">My Cart</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="auth/login.php">Login</a></li>
            <li><a href="auth/signup.php">Signup</a></li>
            <li><a href="auth/logout.php">Logout</a></li>
        </nav>
    </div>
</head>`

<body>
    <div class="order_content_wrapper">
        <form action="">
            <div class="form_contaitner">
                <div class="shipping_details">
                    <h5 class='cart_heading'>Order Details</h5>

                    <div class="input-fullname">
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" class="field" id="username" name="fullname" placeholder="Your Name">
                    </div>

                    <div class="input-province">
                        <label for="province">Province</label>
                        <select name="province" class="field" id="province">
                            <option value="sindh">Sindh</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Balouchistan">Balouchistan</option>
                            <option value="FATA">FATA</option>
                            <option value="Gilgit-Baltistan">Gilgit-Baltistan</option>
                            <option value="khyner-Pakhtunkhwa">Khyner-Pakhtunkhwa"</option>
                        </select>
                    </div>
                    <div class="split">
                        <div class="input-city">
                            <label for="city">City</label>
                            <input type="text" class="field" id="city" name="city" placeholder="Your City">
                        </div>
                        <div class="input-zip">
                            <label for="zip">Zip</label>
                            <input type="text" class="field" id="zip" name="zip" placeholder="Your Zip">
                        </div>
                    </div>
                    <div class="input-area">
                        <label for="area">Area</label>
                        <input type="text" class="field" id="area" name="area" placeholder="Your Area">
                    </div>
                    <div class="input-address">
                        <label for="address">Address</label>
                        <input type="text" class="field" id="address" name="address" placeholder="Your Adress">
                    </div>


                </div>
                <div class="order_summary">
                    <h3 class='cart_heading'>Discount and Payment</h3>
                    <div class="payment_method">
                        <div class="cod">
                            <label for="cod">
                                <img src="png/cod.png" alt="COD png">
                            </label>
                            <input type="radio" id="cod" name="method" value="Cash on Delivery" hidden>
                        </div>

                        <div class="card">
                            <label for="Debit">
                                <img src="png/card.png" alt="">
                            </label>
                            <input type="radio" id="Debit" name="method" value="Debit Card" hidden>

                        </div>

                        <div class="easypaisa">
                            <label for="EasyPaisa">
                                <img src="png/easypaisa.png" alt="">
                            </label>
                            <input type="radio" id="EasyPaisa" name="method" value="EasyPaisa" hidden>
                        </div>

                    </div>
                    <input type="text" class="field" placeholder="Promo Code">
                    
                    <div class="checkout_details">
                        <h3>Order Summary</h3>
                        <div class="checkout_text">
                            <span>Total Items</span>
                            <span>Rs. <?php echo $summary['total_items']; ?></span>
                        </div>
                        <div class="checkout_text">
                            <span>Delivery Fee</span>
                            <span>Rs. <?php echo $summary['delivery_fee']; ?></span>
                        </div>
                        <div class="checkout_text">
                            <span>Promo Code</span>
                            <span>-Rs. <?php echo $summary['discount']; ?></span>
                        </div>
                        <div class="checkout_text">
                            <span>Total Payment</span>
                            <span>Rs. <?php echo $summary['sub_total']; ?></span>
                        </div>
                        <button type="submit" class="place_order_btn" id="submit" name="order_place">Place Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>