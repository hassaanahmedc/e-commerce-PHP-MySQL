<?php
require_once 'verify.php';
$grand_total =  0;
function fetch_cart($pdo, $user_id)
{
    if (!isset($user_id)) {
        echo "<h2 style='text-align:center;'>Please login first!</h2>";
        exit;
    } else {
        $uid = $_SESSION['user_id'];
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

        return array('stmt' => $query, 'user_id' => $uid);
    }
}

function get_cart_items($pdo)
{
    global $grand_total;
    $query = fetch_cart($pdo, $_SESSION['user_id']);
    while ($row = $query['stmt']->fetch(PDO::FETCH_ASSOC)) {
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

    $_SESSION['sub_total'] = $grand_total;

    remove_cart_item($pdo);
    update_cart($pdo);
}

function remove_cart_item($pdo)
{
    if (isset($_GET['pid'])) {
        $pid = $_GET['pid'];
        $stmt = $pdo->prepare("DELETE FROM cart_details WHERE product_id = :pid");
        $stmt->bindParam(':pid', $pid, PDO::PARAM_INT);
        $stmt->execute();

        // check if cart is empty after deleting item
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM cart_details WHERE cart_id = :cid");
        $stmt->bindParam(':cid', $_SESSION['cart_id'], PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count == 0) {
            $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = :uid");
            $stmt->bindParam(':uid', $_SESSION['user_id'], PDO::PARAM_INT);
            $stmt->execute();
        }

        header('Location: cart.php');
    }
}

function update_cart($pdo)
{
    $button_class = "";
    if (isset($_POST['update']) && isset($_POST['pid'])) {
        $user_id = $_SESSION['user_id'];
        $item_prices = $_POST['item_price'];
        $qtys = $_POST['qty'];

        // loop through the submitted item prices and quantities and update the cart details table accordingly
        for ($i = 0; $i < count($item_prices); $i++) {
            $item_price = $item_prices[$i];
            $qty = $qtys[$i];
            $sub_total = $item_price * $qty;
            $pid = $_POST['pid'][$i];
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
    } elseif (isset($_POST['place_order']) && isset($_POST['pid'])) {
        header('Location: order.php');
    }

    // check if cart is empty and set button class to "hide-btn" if it is
    $user_id = $_SESSION['user_id'];
    $query = $pdo->prepare("SELECT * FROM cart WHERE user_id=:user_id");
    $query->bindParam(":user_id", $user_id, PDO::PARAM_INT);
    $query->execute();
    $cart_row = $query->fetch(PDO::FETCH_ASSOC);
    if (!$cart_row) {
        $button_class = "hide-btn";
    }
    return $button_class;
}
?>