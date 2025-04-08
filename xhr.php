<?php
session_start();
// var_dump($_POST['product']);
$product = json_decode($_POST['product'], true);
if (isset($_SESSION['cart'])) {
    $_SESSION['cart'][] = $product;
} else {
    $_SESSION['cart'] = array($product);
}
// var_dump($_SESSION);