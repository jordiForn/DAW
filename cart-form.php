<?php
    include 'connection.php';
    include 'usrData.php';
?>

<!DOCTYPE html>
<html lang="ca" class="form-page">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
    <title>Formulari de Compra</title>
    
</head>

<body class="form-page">

    <header>
        <h1>Formulari de Compra</h1>
        <div>
            <a href="cart.html">Carret</a>
            <a href="index.php">Pàgina principal</a>
        </div>
    </header>
    <div class="container">
        <div class="form-container">
            <form id="purchase-form" action="process_order.php" method="POST">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($username); ?>">

                <label for="email">Correu electrònic:</label>
                <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($email); ?>">

                <label for="address">Direcció d’enviament:</label>
                <input type="text" id="address" name="address" required>

                <label for="phone">Telèfon:</label>
                <input type="tel" id="phone" name="phone" required value="<?php echo htmlspecialchars($phone); ?>">

                <label for="notes">Notes adicionals (opcional):</label>
                <textarea id="notes" name="notes" value="null"></textarea>

                <input type="hidden" id="cart-data" name="cart_data">
                <input type="hidden" id="cart-total-hidden" name="cart_total" value="">

                <button type="submit" onclick="getTotal()">Confirmar compra</button>
            </form>

        </div>
    </div>
    
</body>

</html>