<?php
session_start();

if (!isset($_SESSION['user_details'])) {
    // Redirect to the personal details page if user details are not set
    header("Location: persoonsgegevens.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Thanks for ordering</title>
</head>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<body>
    <div class="thank-you-container">
        <h1>Thank You for Your Purchase!</h1>
        <p>Here are the products you bought:</p>
        <ul>
            <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $product) {
                    $productName = htmlspecialchars($product['title'] ?? 'Unknown Product');
                    $productPrice = htmlspecialchars($product['price'] ?? '0.00');
                    echo "<li>{$productName} - €{$productPrice}</li>";
                }
            } else {
                echo "<li>No products found in your cart.</li>";
            }
            ?>
        </ul>
        <p><a href="persoonsgegevens.php">Go back to Personal Details</a></p>
    </div>
</body>
<?php include('includes/footer.php'); ?>

</html>