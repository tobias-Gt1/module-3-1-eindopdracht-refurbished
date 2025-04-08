<?php
session_start();

$product_data = [
    [
        "id" => 1,
        "title" => "Oversized Distressed Logo-Print Cotton-Jersey Hoodie",
        "description" => "Balenciaga's hoodie channels the brand's iconic flair for grunge. It's cut from cotton-jersey with dropped shoulders and has a kangaroo pocket for storing small essentials. The hem is frayed to create a lived-in look.",
        "price" => 250,
        "images" => [
            "fotos/w460_q60.avif",
            "fotos/w920_q60 (1).avif",
            "fotos/w2000_q60 (13).avif"
        ]
    ],
    [
        "id" => 2,
        "title" => "Brand-Print Cotton T-Shirt",
        "description" => "Balenciaga is no stranger to a slogan T-shirt, and this one makes such a statement. Made from soft cotton-jersey, it’s cut for a relaxed fit and printed with a sporty logo. Wear yours with everything from jeans to gym leggings.",
        "price" => 250,
        "images" => [
            "fotos/w461_q60.avif",
            "fotos/w2000_q60 (14).avif",
            "fotos/w920_q60 (3).avif"
        ]
    ],
    [
        "id" => 3,
        "title" => "Oversized distressed printed cotton-jersey T-shirt",
        "description" => "The logo on Balenciaga’s T-shirt looks as if it was intricately applied using masking tape. Cut for an oversized fit, it’s made from cotton-jersey that’s distressed to resemble a well-worn favorite. Style yours with jeans or leather leggings.",
        "price" => 750,
        "images" => [
            "fotos/w2000_q60 (1).avif",
            "fotos/w920_q60 (4).avif",
            "fotos/w2000_q60 (15).avif"
        ]
    ],
    [
        "id" => 4,
        "title" => "Logo-Print Cotton-Jersey T-Shirt",
        "description" => "Balenciaga's minimal T-shirt will no doubt get a lot of wear. Cut from soft cotton-jersey for a relaxed fit, it's printed with the brand's standard logo and has a slightly higher than average crew neck.",
        "price" => 575,
        "images" => [
            "fotos/w920_q60.avif",
            "fotos/w2000_q60 (16).avif",
            "fotos/w920_q60 (2).avif"
        ]
    ]
];

$product_id = $_GET['id'] ?? null;

if ($product_id) {
    $product = array_filter($product_data, fn($p) => $p['id'] == $product_id);
    $product = reset($product);

    if ($product) {
        $product_title = $product['title'];
        $product_price = $product['price'];
        $product_images = $product['images'];
        $product_description = $product['description'];
    } else {
        echo "Product not found.";
        exit;
    }
} else {
?>
    <!DOCTYPE html>
    <html lang="en">
    <link rel="stylesheet" href="style.css">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Producten Overzicht</title>
    </head>

    <body>
        <h1>Producten Overzicht</h1>
        <div class="product-list">
            <?php foreach ($product_data as $product) { ?>
                <div class="product-item">
                    <h2><?= htmlspecialchars($product['title']) ?></h2>
                    <p>Price: €<?= htmlspecialchars($product['price']) ?></p>
                    <img src="<?= htmlspecialchars($product['images'][0]) ?>" alt="<?= htmlspecialchars($product['title']) ?>">
                    <a href="clothing.php?id=<?= htmlspecialchars($product['id']) ?>">View Details</a>
                </div>
            <?php } ?>
        </div>
    </body>

    </html>
<?php
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $cart_item = [
        'id' => $product['id'],
        'title' => $product['title'],
        'price' => $product['price'],
        'size' => $_POST['size'] ?? 'M'
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $cart_item;

    header('Location: cart.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product details</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<body>
    <div class="product-detail" style="display: flex; flex-direction: column; align-items: center; max-width: 800px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="product-gallery">
            <img id="large-image" src="<?= htmlspecialchars($product_images[0]) ?>" alt="Large Product Image">
            <div class="thumbnail-container">
                <?php foreach ($product_images as $image) { ?>
                    <img class="thumbnail" src="<?= htmlspecialchars($image) ?>" alt="Thumbnail">
                <?php } ?>
            </div>
        </div>
        <h1 style="font-size: 2rem; font-weight: bold; margin-bottom: 1rem;"><?= htmlspecialchars($product_title) ?></h1>
        <p style="font-size: 1.2rem; color: #555; margin-bottom: 1.5rem;">Description: <?= htmlspecialchars($product_description) ?></p>
        <p style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">Price: €<?= htmlspecialchars($product_price) ?></p>
        <form method="POST" style="margin-top: 20px;">
            <label for="size-select" style="font-size: 1.2rem; font-weight: bold; margin-right: 0.5rem;">Select your size:</label>
            <select id="size-select" name="size" style="padding: 0.5rem; font-size: 1rem; border: 1px solid #ccc; border-radius: 5px;">
                <option value="S">Small</option>
                <option value="M">Medium</option>
                <option value="L">Large</option>
                <option value="XL">Extra Large</option>
            </select>
            <button type="submit" name="add_to_cart" style="margin-top: 20px; padding: 10px 20px; font-size: 1rem; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Add to cart</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.thumbnail').click(function() {
                const newSrc = $(this).attr('src');
                $('#large-image').attr('src', newSrc);
            });
        });
    </script>
</body>
<?php include('includes/footer.php'); ?>

</html>