<?php
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
?>
