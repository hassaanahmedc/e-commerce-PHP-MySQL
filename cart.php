<?php
ob_start();
session_start();
session_regenerate_id();
require_once 'verify.php';
require_once 'cart_crud.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="style/cartPg.css">
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
    <div class="cart_content_wrapper">
        <form action="cart.php" method="post">
            <h1 class='cart_heading'>Shopping Cart</h1>
            <table class="cart_table">
                <thead>
                    <tr>
                        <td colspan="2">Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    <?php get_cart_items($pdo); ?>
                </tbody>
            </table>
            <div class="cart_bottom">
                <div class="cart_total">
                    <span>Subtotal </span>
                    <span>Rs. <?php echo $grand_total ?></span>
                </div>
                <input type="hidden" name="sub_total" value="<?php echo $grand_total ?>">
                <div class="cart_btns <?php echo update_cart($pdo); ?>">
                    <button type="submit" name="update" class="btns cart_update">Update Items</button>
                    <button type="submit" name="place_order" class="btns order_place">Checkout order</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
<?php ob_end_flush(); ?>