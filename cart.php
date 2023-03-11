<?php
require_once 'verify.php';
session_start();
$grand_total =  0;
function get_cart_items($pdo)
{
    if (!isset($_SESSION['user_id'])) {
        echo "<h2 style='text-align:center;'>Please login first!</h2>";
    } else {
        $uid = $_SESSION['user_id'];
        global $grand_total;
        $query = $pdo->prepare("SELECT 
            users.user_id, 
            products.product_id AS pid, 
            products.name, 
            products.price AS item_price, 
            products.img,
            cart_details.quantity, 
            cart_details.price AS sub_total 
            FROM 
                users
            JOIN 
                cart ON users.user_id = cart.user_id
            JOIN 
                cart_details ON cart.cart_id = cart_details.cart_id
            JOIN 
                products ON products.product_id = cart_details.product_id
            WHERE 
                users.user_id=:uid;");

        $query->bindParam(":uid", $uid, PDO::PARAM_INT);
        $query->execute();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $user_id = $row['user_id'];
            $pid = $row['pid'];
            $Product_name = $row['name'];
            $item_price = $row['item_price'];
            $image = $row['img'];
            $qty = $row['quantity'];
            $sub_total = $row['sub_total'];

            echo <<<_END
                <tr>
                    <td class='t_img'><a href="product.php?id=$pid"><img src="imgs/$image" alt=""></a></td>
                    <td>
                        <a href="product.php?id=$pid">$Product_name</a>
                        <br>
                        <a href="cart.php?pid=$pid">Remove items</a>
                    </td>
                    <td>Rs $item_price</td>
                    <td>
                    <input type="hidden" name="pid[]" value="$pid">
                    <input type="hidden" name="item_price[]" value="$item_price">
                    <input type="number" style='width: 50px;' name="qty[]" value='$qty' min='1'>
                </td>
                    <td>Rs. $sub_total</td>
                </tr>
                _END;
            $grand_total += $sub_total;
        }
        remove_cart_item($pdo);
        update_cart($pdo);
    }
}
function remove_cart_item($pdo)
{
    if (isset($_GET['pid'])) {
        $pid = $_GET['pid'];
        $stmt = $pdo->prepare("DELETE FROM cart_details WHERE product_id = :pid");
        $stmt->bindParam(':pid', $pid, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt) {
            header('Location: cart.php');
        } else {
            echo "Something went wrong";
        }
    }
}
function update_cart($pdo)
{
    if (isset($_POST['update'])) {
        $user_id = $_SESSION['user_id'];
        $item_prices = $_POST['item_price'];
        $qtys = $_POST['qty'];

        // loop through the submitted item prices and quantities and update the cart details table accordingly
        for ($i = 0; $i < count($item_prices); $i++) {
            $item_price = $item_prices[$i];
            $qty = $qtys[$i];
            $sub_total = $item_price * $qty;
            $pid = $_POST['pid'][$i]; // assuming you have a hidden input field with the product id for each item

            $query = $pdo->prepare("UPDATE cart_details SET quantity=:qty, price=:sub_total WHERE cart_id=(SELECT cart_id FROM cart WHERE user_id=:user_id) AND product_id=:pid");

            $query->bindParam(":qty", $qty, PDO::PARAM_INT);
            $query->bindParam(":sub_total", $sub_total);
            $query->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $query->bindParam(":pid", $pid, PDO::PARAM_INT);
            $query->execute();
            if ($query) {
                header('Location: cart.php');
            } else {
                echo "Something went wrong";
            }
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
</head>`

<body>
    <div class="cart_content_wrapper">
        <h1 class='cart_heading'>Shopping Cart</h1>
        <form action="cart.php" method="post">
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
                    <?php get_cart_items($pdo); ?>
                </tbody>
            </table>
            <div class="subtotal">
                <span>Subtotal</span>
                <span><?php echo $grand_total ?></span>
            </div>
            <div class="btn">
                <button type="submit" name="update" class="cart_update">Update</button>
                <button type="submit" name="place_order" class="order_place">Update</button>
            </div>
        </form>
    </div>
</body>

</html>