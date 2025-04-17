<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks for ordering</title>
</head>
<body>
    <h1>Thank You for Your Purchase!</h1>
    <p>Here are the products you bought:</p>
    <ul>
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $product) {
                echo "<li>" . htmlspecialchars($product) . "</li>";
            }
        } else {
            echo "<li>No products found in your cart.</li>";
        }
        ?>
    </ul>
</body>
</html>