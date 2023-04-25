<?php
session_start();
require_once 'verify.php';
require_once 'cart_crud.php';
require_once 'order_functions.php';
require_once 'functions.php';
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
        <?php navbar() ?>
        </nav>
    </div>
</head>

<body>
    <div class="order_placed_wrapper" style="background: white; width: 75%; margin:0 auto">
        <div class="user_msg" style="text-align:center; margin-top:3em ; padding: 2em; border-radius: 8px;">
            <?php echo place_order($pdo); ?>
        </div>

    </div>
</body>

</html>