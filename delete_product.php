<?php
include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM productes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Producte eliminat correctament.";
    } else {
        echo "Error eliminant el producte: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>