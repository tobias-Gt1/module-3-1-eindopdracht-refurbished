<?php
session_start();

$cart = $_SESSION['cart'] ?? [];
$total_price = array_reduce($cart, fn($sum, $item) => $sum + $item['price'], 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_item'])) {
    $itemIndex = $_POST['remove_item'];
    unset($cart[$itemIndex]);
    $_SESSION['cart'] = $cart;
    header("Location: cart.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<body>
    <h1 style="text-align: center;">Shopping Cart</h1>
    <div class="cart-container" style="max-width: 800px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <?php if (empty($cart)) { ?>
            <p>Your shopping cart is empty.</p>
        <?php } else { ?>
            <ul>
                <?php foreach ($cart as $index => $item) { ?>
                    <li>
                        <strong><?= htmlspecialchars($item['title']) ?></strong> -
                        Size: <?= htmlspecialchars($item['size']) ?> -
                        Price: €<?= htmlspecialchars($item['price']) ?>
                        <form method="post" style="display: inline;">
                            <button type="submit" name="remove_item" value="<?= $index ?>" style="margin-left: 10px; padding: 5px 10px; font-size: 0.9rem; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                Remove
                            </button>
                        </form>
                    </li>
                <?php } ?>
            </ul>
            <div class="cart-total" style="margin-top: 20px; text-align: center; font-size: 1.5rem; font-weight: bold;">
                Total Price: €<?= htmlspecialchars($total_price) ?>
            </div>
            <a href="persoonsgegevens.php" style="display: inline-block; margin-top: 20px; padding: 10px 20px; font-size: 1rem; background-color: #007bff; color: white; text-decoration: none; border: none; border-radius: 5px; cursor: pointer;">
                Proceed to checkout.
            </a>
        <?php } ?>
    </div>
</body>
<?php include('includes/footer.php'); ?>

</html>