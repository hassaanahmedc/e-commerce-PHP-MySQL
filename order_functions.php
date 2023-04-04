<?php
require_once 'verify.php';
require_once 'cart_crud.php';
function order_summary($delivery_fee = "Free", $promo = 0)
{
    if (isset($_SESSION['sub_total']) && is_int($_SESSION['sub_total']) && $_SESSION['sub_total'] > 0) {
        $subtotal = $_SESSION['sub_total'];
        if (isset($delivery_fee) && $delivery_fee > 0) {
            $delivery = $delivery_fee;
            $subtotal += $delivery;
        }
        if (isset($promo) && $promo > 0) {
            $discount = $promo;
            $subtotal -= $discount;
        }
        if ($subtotal < 0){
            $subtotal = 0;
        }
        $summary = array(
            'total_items' => $_SESSION['sub_total'],
            'delivery_fee' => $delivery,
            'discount' => $discount,
            'sub_total' => $subtotal
        );
        return $summary;
    } else {
        return "Please Login first";
    }
}

function place_order($pdo)
{
    $requiredFields = ['fullname', 'province', 'city', 'zip', 'address'];
    $valid_provinces = ['Sindh', 'Punjab', 'Balouchistan', 'FATA', 'Gilgit-Baltistan', 'Khyber-Pakhtunkhwa'];

    $errors = [];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = 'This field is required';
        }
    }

    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
        echo "Invalid name input. Only alphabetic characters are allowed.";
        return;
    }

    $province = filter_input(INPUT_POST, 'province', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!in_array($province, $valid_provinces)) {
        echo "Invalid province input.";
        return;
    }

    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!preg_match('/^[a-zA-Z]+$/', $city)) {
        echo "Invalid city input. Only alphabetic characters are allowed.";
        return;
    }

    $zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);
    if (!is_int($zip)) {
        echo "Invalid zip code input. Only numeric values are allowed.";
        return;
    }

    $area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $area)) {
        echo "Invalid area input.";
        return;
    }

    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $address)) {
        echo "Invalid address input.";
        return;
    }

    try {
        $datetime = date('Y-m-d H:i:s');
        $get_total = order_summary(400, 1000);
        $query = fetch_cart($pdo);
        $row = $query->fetch(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare("INSERT INTO orders(user_id, order_date, order_total, 
        shipping_address, shipping_state, shipping_zip, shipping_city, full_name) VALUES
        (:uid, :order_date, :total_payment, :address, :province, :zip_code, :city, :name)");

        $stmt->bindParam(':uid', $row['user_id'], PDO::PARAM_STR);
        $stmt->bindParam(':order_date', $datetime, PDO::PARAM_STR);
        $stmt->bindParam(':total_payment', $get_total['sub_total'], PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':province', $province, PDO::PARAM_STR);
        $stmt->bindParam(':zip_code', $zip, PDO::PARAM_INT);
        $stmt->bindParam(':city', $city, PDO::PARAM_STR);
        $stmt->bindParam(':name', $fullname, PDO::PARAM_STR);

        $stmt->execute();
        echo <<<_END
        <h1 style="padding: 1em;">Your Order Has Been Placed!</h1>
        <p style="margin:1em; font-size: 1.1rem;">Thank you for ordering with us! We'll contact you by email with your order details.</p>
        <a href="index.php">Shop more</a>
        _END; 
    } catch (PDOException $e) {
        throw new Exception("An error occurred: " . $e->getMessage());
    } 
}
?>