<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto - HYPE</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <header>
        <h1>Detalle del Producto</h1>
    </header>

    <main class="product-container">
        <!-- Imagen del producto -->
        <div class="product-gallery">
            <img id="main-image" src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Producto">
            <div class="thumbnails">
                <img class="thumbnail" src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Imagen 1">
                <img class="thumbnail" src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Imagen 2">
                <img class="thumbnail" src="https://shoelab.cr/wp-content/uploads/2024/09/hf8833-100_1.jpg" alt="Imagen 3">
            </div>
        </div>

        <!-- Información del producto -->
        <div class="product-info">
            <h2>Pleasures Buzo Zip Dragon Marrón</h2>
            <p class="price">$120.00</p>
            
            <div class="sizes">
                <h3>Tallas disponibles</h3>
                <div class="size-options">
                    <button class="size">S</button>
                    <button class="size">M</button>
                    <button class="size">L</button>
                    <button class="size">XL</button>
                </div>
            </div>

            <div class="quantity">
                <h3>Cantidad</h3>
                <input type="number" min="1" value="1">
            </div>

            <button class="buy-button">Agregar al Carrito</button>

            <p class="description">
                Este buzo de Pleasures con cremallera y diseño de dragón es ideal para un estilo urbano y moderno. Fabricado con materiales de alta calidad para máxima comodidad.
            </p>
        </div>
    </main>

    <script src="scripts.js"></script>

</body>
</html>
