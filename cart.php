<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'cart_functions.php';
require_once 'verify.php';

create_cart($pdo, $product);
echo "Item added successfully !!";

?>