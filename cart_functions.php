<?php
require_once 'verify.php'; 
                     
//funtion to get details about a specific product by it product ID
function fetch_product_details($pdo)
{
    if (!isset($_POST['product_id'])) {
        throw new Exception('Please select a product!');
    }
    $pid = isset($_POST['product_id']) && is_numeric($_POST['product_id']) ? intval($_POST['product_id']) : null;
    $qty = isset($_POST['quantity']) && is_numeric($_POST['quantity']) ? intval($_POST['quantity']) : null;

    $query = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$pid]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        throw new Exception("Product not found!");
    }
    $details =
        array(
            'name' => $row['name'],
            'category' => $row['category'],
            'price' => $row['price'],
            'quantity' => $qty,
            'company' => $row['company'],
            'img' => $row['img'],
            'id' => $pid,
        );
    return $details;
}
$product = fetch_product_details($pdo);

//funtion to add product in the cart
function add_product_in_cart($pdo, $product, $cart_id)
{
    if (!$product) {
        throw new Exception('Please select a product!');
    };
    $p_price = $product['price'];
    $qty = $product['quantity'];
    $p_id = $product['id'];
    $c_id = $cart_id;

    try {
        $stmt = $pdo->prepare("SELECT quantity, price FROM cart_details WHERE cart_id = :cid AND product_id = :pid");
        $stmt->bindParam(':cid', $c_id, PDO::PARAM_INT);
        $stmt->bindParam(':pid', $p_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result){
            $new_quantity = $result['quantity'] += $qty;
            $total_price = $p_price * $qty;
            $new_price = $result['price'] += $total_price;

            $stmt = $pdo->prepare("UPDATE cart_details SET quantity = :qty, price = :price WHERE cart_id = :cid AND product_id = :pid");
            $stmt->bindParam(':qty', $new_quantity, PDO::PARAM_INT);
            $stmt->bindParam(':price', $new_price, PDO::PARAM_INT);
            $stmt->bindParam(':cid', $c_id, PDO::PARAM_INT);
            $stmt->bindParam(':pid', $p_id, PDO::PARAM_INT);
            $stmt->execute();

        }else{
            $total_price = $p_price * $qty;
            $stmt = $pdo->prepare("INSERT INTO cart_details (cart_id, product_id, quantity, price) VALUES(:cid, :pid, :qty, :price)");
            $stmt->bindParam(':cid',  $c_id, PDO::PARAM_INT);
            $stmt->bindParam(':pid',  $p_id, PDO::PARAM_INT);
            $stmt->bindParam(':qty',  $qty, PDO::PARAM_INT);
            $stmt->bindParam(':price',  $total_price, PDO::PARAM_INT);
            $stmt->execute();

        }

    } catch (PDOException $e) {
        throw new Exception("An error occured: " . $e->getMessage());
    }
}

//this function create cart and then add products in cart details table with cart id returned by carts table
function create_cart($pdo, $product)
{
    if (!isset($_SESSION['user_id'])) {
        echo "<h1>Please login first</h1>";
        exit;
    }
    try {
        $user_id = $_SESSION['user_id'];
        $datetime = date('Y-m-d H:i:s');
        
        $stmt = $pdo->prepare("SELECT cart_id from cart WHERE user_id = :uid");
        $stmt->bindParam(':uid', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($results) {
            $cart_id = $results['cart_id'];
        } else {
            $query = "INSERT INTO cart (user_id, created_at) VALUES (:user_id, :created_at)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':created_at', $datetime);
            $stmt->execute();
    
            $cart_id = $pdo->lastInsertId();
        }
        add_product_in_cart($pdo, $product, $cart_id);
        echo <<<_END
            <h1>Items added successfully to your cart!</h1>
            <a href="index.php">Shop more</a>
            <a href="cart.php">Show cart</a>
        _END;
        
    } catch (PDOException $e) {
        throw new Exception("An error occurred: " . $e->getMessage());
    }
}
?>