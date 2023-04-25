<?php
ob_start();
session_start();
session_regenerate_id();
require_once 'verify.php';
require_once 'cart_crud.php';
require_once 'functions.php';
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
        <?php navbar() ?>
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
                    <?php if (isset($_SESSION['user_id'])) {
                        get_cart_items($pdo, $_SESSION['user_id']);
                    } ?>
                </tbody>
            </table>
            <div class="cart_bottom">
                <div class="cart_total">
                    <span>Subtotal </span>
                    <span>Rs.
                        <?php echo $grand_total ?>
                    </span>
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