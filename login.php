<?php 
    include 'connection.php';
    include 'logged.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = $conn->prepare("SELECT * FROM client WHERE nom_login = ? AND contrasena = ?");
        $sql->bind_param("ss", $username, $password);
        $sql->execute();
        $result = $sql->get_result();
        
        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            session_regenerate_id(true);
            $_SESSION['username'] = $user['nom_login'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['tlf'] = $user['tlf'];
            $_SESSION['rol'] = $user['rol']; 
            header("Location: index.php");
        }else{
            echo "Nom d'usuari o contrasenya incorrectes.";
        }

        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tenda de Jardineria</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="login-page">

    <header class="login-page">
        <h1>Tenda de Jardineria</h1>
        <div>
            <a href="index.php">Pàgina principal</a>
        </div>
    </header>

    <div class="container">
        <h1>Iniciar Sessió</h1>
        <form class="form-container" action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Nom d'usuari</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contrasenya</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Iniciar Sessió</button>
        </form>
        <p>Encara no tens un compte? <a href="signup.php">Registra't aquí</a></p>
    </div>
</body>

</html>