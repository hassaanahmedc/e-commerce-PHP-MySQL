<?php
require_once 'cart_functions.php';
require_once 'verify.php';
session_start();
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
    <div class="user_msg" style="text-align:center; margin: 0 auto;">
        <h1><?php echo create_cart($pdo, $product); ?></h1>
        <a href="index.php">Shop more</a>
        <a href="cart.php">Show cart</a>

    </div>
</body>

</html>