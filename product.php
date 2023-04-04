<?php
require_once 'verify.php';
require_once 'functions.php';

$details = render_selected_item($pdo);
foreach ($details as $product_details);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/prooductPg.css">
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
</head>

<body>
    <div class="product_wrapper">
        <div class="product">
            <section>
                <div class='primage_container'>
                    <img src="imgs/<?php echo $product_details['img'] ?>" alt="" class="product_image">
                </div>
                <div class="product_details">
                    <p class="product_name"><?php echo $product_details['name'] ?></p>
                    <div class='stars'>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p class="product_price">Rs. <?php echo $product_details['price'] ?></p>
                    <div class="buy_section">
                        <form method='POST' action='cart_status.php'>
                            <input type='hidden' name='product_id' value='<?php echo $product_details['product_id'] ?>'>
                            <span class='quantity_text'>Quantity</span>
                            <input type="number" class='quantity' name='quantity' value='1' min='1'>
                            <div class='cart_btns'>
                                <input type="submit" class="btns cart_update" value="Add to Cart">
                                <a class='btns order_place'>Buy Now</a>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <section class="product_info">
                <h3>Product Description</h3>
                <p><?php echo $product_details['description'] ?></p>
            </section>
        </div><br>
        <aside class="similar_items_container">
            <p class='similar_items'>Similar Products</p>
            <div class="similar_item_card">
                <?php
                render_items_by_category($pdo, $product_details['category']);
                ?>
            </div>
        </aside>
    </div>

</body>

</html>