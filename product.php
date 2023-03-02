<?php
require_once 'verify.php';
require 'functions.php';
function render_selected_item($pdo)
{
    if (isset($_GET['id'])) {
        $pid = $_GET['id'];
        $query = "SELECT * FROM products WHERE product_id = $pid";
        $result = $pdo->query($query);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $name = $row['name'];
            $prize = $row['price'];
            $image = $row['img'];
            include 'product_card.php';
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