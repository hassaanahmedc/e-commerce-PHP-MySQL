<?php
session_start();
require_once 'verify.php';
require_once 'cart_crud.php';
require_once 'order_functions.php';
// $summary = order_summary(400, 1000);
// $error = "";
// $fullname = "Ahmed";
// if (!preg_match('/^[a-zA-Z]+$/', $fullname)) {
//     echo "Name is not Valid";
// } else {
//     $province = $province = "FATA";
//     $provinces = array("Sindh", "Punjab", "Balouchistan", "FATA", "Gilgit-Baltistan", "Khyner-Pakhtunkhwa");
//     if (!in_array($province, $provinces)) {
//         echo "Invalid Province";
//     } else {
//         $city = "Sukkur";
//         if (!preg_match('/^[a-zA-Z]+$/', $city)) {
//             echo "City is not Valid";
//         } else {
//             $zip = "45759";
//             if (!preg_match('/^[0-9]+$/', $zip) && !is_int($zip)) {
//                 echo "Invalid zip code input. Only numeric values are allowed.";
//             } else {
//                 $address = "Bedil Bekas Colon7y Block 4 Ac";
//                 if (!preg_match('/^[a-zA-Z0-9\s]+$/', $address)) {
//                     echo "Address is not Valid";
//                 } else {
//                     try {
//                         $datetime = date('Y-m-d H:i:s');
//                         $query = fetch_cart($pdo);
//                         $row = $query->fetch(PDO::FETCH_ASSOC);

//                         $stmt = $pdo->prepare("INSERT INTO orders(user_id, order_date, order_total, 
//                                                                     shipping_address, shipping_state, shipping_zip, shipping_city, full_name) VALUES
//                                                                     (:uid, :order_date, :total_payment, :address, :province, :zip_code, :city, :name)");

//                         $stmt->bindParam(':uid', $row['user_id'], PDO::PARAM_STR);
//                         var_dump($stmt);
//                         $stmt->bindParam(':order_date', $datetime, PDO::PARAM_STR);
//                         var_dump($stmt);
//                         $stmt->bindParam(':total_payment', $subtotal, PDO::PARAM_STR);
//                         var_dump($stmt);
//                         $stmt->bindParam(':address', $address, PDO::PARAM_STR);
//                         var_dump($stmt);
//                         $stmt->bindParam(':province', $province, PDO::PARAM_STR);
//                         var_dump($stmt);
//                         $stmt->bindParam(':zip_code', $zip, PDO::PARAM_INT);
//                         var_dump($stmt);
//                         $stmt->bindParam(':city', $city, PDO::PARAM_STR);
//                         var_dump($stmt);
//                         $stmt->bindParam(':name', $fullname, PDO::PARAM_STR);
//                         var_dump($stmt);
//                         $stmt->execute();
//                         echo "<h2>Order has been Placed successfuly!</h2>";
//                     } catch (PDOException $e) {
//                         throw new Exception("An error occurred: " . $e->getMessage());
//                     }
//                 }
//             }
//         }
//     }
// }
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
</head>
<body>
    <div class="order_placed_wrapper" style="background: white; width: 75%; margin:0 auto">
        <div class="user_msg" style="text-align:center; margin: 0 auto; padding: 2em; border-radius: 8px;">
            <?php echo place_order($pdo); ?>
        </div>

    </div>
</body>

</html>