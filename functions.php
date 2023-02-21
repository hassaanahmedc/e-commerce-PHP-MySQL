<?php
require_once 'verify.php';

$latest_item_query = "SELECT * FROM products ORDER BY product_id DESC";
$latest_items = $pdo->query($latest_item_query);
function render_items($latest_items){
    while ($row = $latest_items->fetch(PDO::FETCH_ASSOC)){
        $id = $row['product_id'];
        $name = $row['name'];
        $prize = $row['price'];
        $image = $row['img'];
        echo <<<_END
        <div class="items">
            <img src="imgs/$image" alt="" class="images">
            <div class="item_details">
            <a href='product.php?id=$id' class="item_name">$name</a>
                <p class="item_price">Rs $prize</p>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>    
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i> 
            </div>
        </div><br>
        _END;
    }
}
$watches_query = "SELECT * FROM products WHERE category = 'Watches'";
$watches = $pdo->query($watches_query);
function render_watches($watches){
    while ($row = $watches->fetch(PDO::FETCH_ASSOC)){
        $id = $row['product_id'];
        $name = $row['name'];
        $prize = $row['price'];
        $image = $row['img'];
        echo <<<_END
        <div class="items">
            <img src="imgs/$image" alt="" class="images">
            <div class="item_details">
            <a href='product.php?id=$id' class="item_name">$name</a>
                <p class="item_price">Rs $prize</p>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>    
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
        </div><br>
        _END;
    }
}

$electronics_query = "SELECT * FROM products WHERE category = 'electronics'";
$electronics = $pdo->query($electronics_query);
function render_electronics($electronics){
    while ($row = $electronics->fetch(PDO::FETCH_ASSOC)){
        $id = $row['product_id'];
        $name = $row['name'];
        $prize = $row['price'];
        $image = $row['img'];
        echo <<<_END
        <div class="items">
            <img src="imgs/$image" alt="" class="images">
            <div class="item_details">
            <a href='product.php?id=$id' class="item_name">$name</a>
                <p class="item_price">Rs $prize</p>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>    
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
        </div><br>
        _END;
    }
}

$cosmetics_query = "SELECT * FROM products WHERE category = 'cosmetics'";
$cosmetics = $pdo->query($cosmetics_query);
function render_cosmetics($cosmetics){
    while ($row = $cosmetics->fetch(PDO::FETCH_ASSOC)){
        $id = $row['product_id'];
        $name = $row['name'];
        $prize = $row['price'];
        $image = $row['img'];
        echo <<<_END
        <div class="items">
            <img src="imgs/$image" alt="" class="images">
            <div class="item_details">
            <a href='product.php?id=$id' class="item_name">$name</a>
                <p class="item_price">Rs $prize</p>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
        </div><br>
        _END;
    }
}

$sports_query = "SELECT * FROM products WHERE category = 'sports' ORDER BY product_id DESC";
$sports = $pdo->query($sports_query);
function render_sports($sports){
    while ($row = $sports->fetch(PDO::FETCH_ASSOC)){
        $id = $row['product_id'];
        $name = $row['name'];
        $prize = $row['price'];
        $image = $row['img'];
        echo <<<_END
        <div class="items">
            <img src="imgs/$image" alt="" class="images">
            <div class="item_details">
                <a href='product.php?id=$id' class="item_name">$name</a>
                <p class="item_price">Rs $prize</p>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
        </div><br>
        _END;
    }
}

function header_temp(){
    echo <<<_END
    <div class="nav_container">
        <nav class='navbar'>
            <h1 class="navtxt">ShopEase</h1>
            <li><a href="">Home</a></li>
            <li><a href="">Products</a></li>
            <li><a href="">My Cart</a></li>
            <li><a href="">Contact Us</a></li>
        </nav>
    </div>
    _END;
}

?>