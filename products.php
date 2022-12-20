<?php
require_once 'verify.php';

$query = "SELECT * FROM items";
$result = $pdo->query($query);
function render_items($result){
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        $name = $row['name'];
        $prize = $row['price'];
        $image = $row['img'];
        echo <<<_END
        <div class="items">
            <img src="imgs/$image" alt="" class="images">
            <div class="item_details">
                <p class="item_name">$name</p>
                <p class="item_price">Rs $prize</p>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>    
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
        </div><br>
        _END;
    }
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
    <header>
        <div class="nav_container">
            <nav class='navbar'>
            <h1 class="navtxt">Daraz Shopping</h1>
                <li><a href="">Home</a></li>
                <li><a href="">Products</a></li>
                <li><a href="">My Cart</a></li>
                <li><a href="">Contact Us</a></li>
            </nav>
        </div>

        <div class="img_container">
        <img class='img1' src="header_imgs/new.jpg" alt="imgae1">
        <!-- <img class='img2' src="/header_imgs/img2.jpg" alt="imgae2">
        <img class='img3' src="/header_imgs/img3.jpg" alt="imgae3">
        <img class='img4' src="/header_imgs/img4.jpg" alt="imgae4"> -->
        <div class="headertxt">
            <h1 class="headertxt1">Shopping Cart</h1>
            <p class="headertxt2">Essential items for everyday use!</p>
        </div>
        </div>
    </header> 
    <title>Products</title>
</head>
    <body>
        <div class="wrapper">
            <div class="container">
                <h1 class='product_heading'>Latest Products</h1>
                <div class="item_container">
                    <?php
                        render_items($result);
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>