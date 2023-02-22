<?php
require_once 'functions.php';
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
    
    <header>
        <?php header_temp()?>
        
        <div class="img_container">
        <img class='img1' src="header_imgs/new.jpg" alt="imgae1">
        <!-- <img class='img2' src="/header_imgs/img2.jpg" alt="imgae2">
        <img class='img3' src="/header_imgs/img3.jpg" alt="imgae3">
        <img class='img4' src="/header_imgs/img4.jpg" alt="imgae4"> -->
        <div class="headertxt">
            <h1 class="headertxt1">ShopEase</h1>
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
                        render_items($latest_items);
                    ?>
                </div>
                <h1 class='product_heading'>Watches</h1>
                <div class="item_container">
                    <?php
                        render_watches($watches);
                    ?>
                </div>

                <h1 class='product_heading'>Electronics</h1>
                <div class="item_container">
                    <?php
                        render_electronics($electronics);
                    ?>
                </div>

                <h1 class='product_heading'>Cosmetics</h1>
                <div class="item_container">
                    <?php
                        render_cosmetics($cosmetics);
                    ?>
                </div>

                <h1 class='product_heading'>Sports</h1>
                <div class="item_container">
                    <?php
                        render_sports($sports);
                    ?>
                </div>
            </div>
        </div>
        <footer>
            <div class="footer_container">
                <p class="footer_text">Created and Designed by Hassaan</p>
            </div>
        </footer>
    </body>
</html>