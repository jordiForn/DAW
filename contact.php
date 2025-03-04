<?php
    include 'connection.php';
    include 'usrData.php';
    include 'logged.php';

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $notes = $_POST['notes'];
        
        $sql = "SELECT id, consulta FROM client WHERE nom_login = '$username'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            $id = $user['id'];
            $currentNotes = $user['consulta'];
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $notes = $currentNotes . '| ' . $notes;
        $sql = $conn->prepare('UPDATE client SET consulta = ? WHERE nom_login = ?');
        $sql->bind_param('ss', $notes, $username);
        
        if($sql->execute()){
            echo "<script>
                    alert('Contacte enviat amb èxit');
                    window.location.href = 'index.php';
                </script>";
        }else{
            echo "Error: " . $sql->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="visibility.js" defer></script>
    <title>Contacte</title>
</head>
<body>
    <header>
        <h1>Formulari de Contacte</h1>
        <div>
            <a href="index.php">Pàgina principal</a>
        </div>
    </header>

    <div class="container">
        <div class="form-container">
            <form id="contact-form" action="contact.php" method="POST">
                <label for="name" id="name-label" style="display: none;">Nom:</label>
                <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($username); ?>" style="display: none;">

                <label for="email"  id="email-label" style="display: none;">Correu electrònic:</label>
                <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($email); ?>" style="display: none;">

                <label for="phone"  id="phone-label" style="display: none;">Telèfon:</label>
                <input type="tel" id="phone" name="phone" required value="<?php echo htmlspecialchars($phone); ?>" style="display: none;">

                <label for="notes">Missatge:</label>
                <textarea id="notes" name="notes" value="null" required></textarea>

                <button type="submit">Enviar missatge</button>
            </form>

        </div>
    </div>

</body>
</html>