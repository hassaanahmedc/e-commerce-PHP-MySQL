<?php
require_once 'verify.php';

function render_items_by_category($pdo, $category = null)
{
    $query = "SELECT * FROM products ";
    if ($category !== null) {
        $query .= "WHERE category = :category ORDER BY product_id DESC;";
    } else {
        $query .= "ORDER BY product_id DESC";
    }
    $stmt = $pdo->prepare($query);
    
    if ($category !== null) {
        $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    }
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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

function render_selected_item($pdo, )
{ 
    if (isset($_GET['id'])) {

        $pid = $_GET['id'];
        $details = array();

        $query = "SELECT * FROM products WHERE product_id = $pid";
        $result = $pdo->query($query);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $details[] = $row;
        }
        return $details;
    }
}  
?>
