<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tenda de Jardineria</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="signup-page">

    <header class="signup-page">
        <h1>Tenda de Jardineria</h1>
        <div>
            <a href="index.php">Pàgina principal</a>
        </div>
    </header>

    <div class="container">
        <h1>Registrar-se</h1>
        <form class="form-container" action="signup.php" method="POST">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="surname">Cognoms</label>
                <input type="text" id="surname" name="surname">
                
            </div>
            <div class="form-group">
                <label for="email">Correu electrònic</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="username">Nom d'usuari</label>
                <input type="text" id="username" name="username" required>
                
            </div>
            <div class="form-group">
                <label for="tlf">Telèfon</label>
                <input type="text" id="tlf" name="tlf" required>
            </div>
            <div class="form-group">
                <label for="password">Contrasenya</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Registrar-se</button>
            
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $tlf = $_POST['tlf'];
        $password = $_POST['password'];

        $sql = "INSERT INTO client (nom, cognom, email, tlf, nom_login, contrasena) 
                VALUES ('$name', '$surname', '$email', '$tlf', '$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Nou registre creat amb èxit";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

    <script src="login.js"></script>
</body>

</html>