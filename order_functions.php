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

function order_details($pdo)
{
    if (isset($_POST['fullname']) && isset($_POST['province']) && isset($_POST['city']) && isset($_POST['zip'])
        && isset($_POST['address']) && isset($_POST['order_place'])) {
        $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!preg_match('/^[a-zA-Z]+$/', $fullname)) {
            echo "Name is not Valid";
        } else {
            $province = filter_input(INPUT_POST, 'province', FILTER_SANITIZE_SPECIAL_CHARS);
            $provinces = array("Sindh", "Punjab", "Balouchistan", "FATA", "Gilgit-Baltistan", "Khyner-Pakhtunkhwa");
            if (!in_array($province, $provinces)) {
                echo "Invalid Province";
            } else {
                $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
                if (!preg_match('/^[a-zA-Z]+$/', $city)) {
                    echo "City is not Valid";
                } else {
                    $zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);
                    if (!preg_match('/^[0-9]+$/', $zip)) {
                        echo "Invalid zip code input. Only numeric values are allowed.";
                    } else {
                        $area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_SPECIAL_CHARS);
                        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $area)) {
                            echo "Area is not Valid";
                        } else {
                            $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
                            if (!preg_match('/^[a-zA-Z0-9\s]+$/', $address)) {
                                echo "Address is not Valid";
                            } else {
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
                        }
                    }
                }
            }
        }
    } else {
        echo "<h4>Please fill the requirements</h4>";
    }
}
?>