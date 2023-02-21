<?php
    session_start();
    require_once 'verify.php';
    require 'functions.php';
    function render_selected_item($pdo){
    if (isset($_GET['id'])){
        $pid = $_GET['id'];
        $query = "SELECT * FROM products WHERE product_id = $pid";
        $result = $pdo->query($query);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $name = $row['name'];
            $prize = $row['price'];
            $image = $row['img'];
            echo <<<_END
            <div class="product">
                <div class='primage_container'>
                    <img src="imgs/$image" alt="" class="product_image">
                </div>
                <div class="product_details">
                    <p class="product_name">$name</p>
                    <div class='stars'>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>    
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>

                    <p class="product_price">Rs. $prize</p>
                    <div class="buy_section">
                        <span class='quantity_text'>Quantity</span>
                        <input type="number" class='quantity' value='1'>
                        <div class='btns'>
                            <button>
                                <a class='item_btn'>Buy Now</a>
                            </button>
                            <button>
                                <a class='item_btn'>Add Cart</a>
                            </button>
                        </div>
                     </div>
                </div>
            </div><br>
            _END;
        }
    
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
    <link rel="stylesheet" href="style/style.css">
    <title>Product</title>
    <?php header_temp() ?>
</head>
<body> 
    <div class="product_wrapper">
        <?php render_selected_item($pdo) ?>
        <div class="similar_items_container">
            <p class='similar_items'>Similar Products</p>
        </div>
        
    </div>

</body>
</html>