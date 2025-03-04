<?php
    include 'connection.php';
    include 'usrData.php';

    $sql = "SELECT id, missatge FROM client WHERE nom_login = '$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        $id = $user['id'];
        $currentNotes = $user['missatge'];
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $address = $_POST['address'];
        $total = $_POST['cart_total'];
        $date = date('Y-m-d H:i:s');
        $notes = $_POST['notes'];

        $sql = $conn->prepare('INSERT INTO comandes (client_id , data_comanda, direccio_enviament, total) VALUES (?, ?, ?, ?)');
        $sql->bind_param('issd', $id, $date, $address, $total);
        
        $notes = $currentNotes . '| ' . $notes;
        $sql1 = $conn->prepare('UPDATE client SET missatge = ? WHERE nom_login = ?');
        $sql1->bind_param('ss', $notes, $username);

        if ($sql->execute() && $sql1->execute()) {
            echo "<script>
                    alert('Comanda processada amb èxit');
                    window.location.href = 'index.php';
                </script>";
        } else {
            echo "Error en la inserción de la comanda: " . $sql->error . "<br>";
            echo "Error en la actualización del missatge: " . $sql1->error;
        }
    }
    ?>