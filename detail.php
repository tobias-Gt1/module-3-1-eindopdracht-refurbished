<?php
// Simuleer productgegevens (vervang dit met databasegegevens indien nodig)
$product = [
    'name' => 'Refurbished Product',
    'description' => 'Dit is een voorbeeld van een refurbished product.',
    'main_image' => 'https://via.placeholder.com/600x400?text=Hoofdafbeelding',
    'gallery' => [
        'https://via.placeholder.com/150x150?text=Afbeelding+1',
        'https://via.placeholder.com/150x150?text=Afbeelding+2',
        'https://via.placeholder.com/150x150?text=Afbeelding+3',
    ],
];
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <style>
        .product-detail {
            text-align: center;
            margin: 20px;
        }

        .product-detail img {
            max-width: 100%;
            height: auto;
        }

        .gallery {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .gallery img {
            width: 150px;
            height: 150px;
            cursor: pointer;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .gallery img:hover {
            border-color: #333;
        }
    </style>
</head>

<body>
    <div class="product-detail">
        <h1><?php echo $product['name']; ?></h1>
        <p><?php echo $product['description']; ?></p>
        <img id="main-image" src="<?php echo $product['main_image']; ?>" alt="Hoofdafbeelding">

        <div class="gallery">
            <?php foreach ($product['gallery'] as $image): ?>
                <img src="<?php echo $image; ?>" alt="Galerijafbeelding" onclick="changeMainImage('<?php echo $image; ?>')">
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        function changeMainImage(imageUrl) {
            document.getElementById('main-image').src = imageUrl;
        }
    </script>
</body>

</html>