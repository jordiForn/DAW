<?php
include 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $descripcio = $_POST['descripcio'];
    $preu = $_POST['preu'];
    $estoc = $_POST['estoc'];

    $sql = "UPDATE productes SET nom = ?, descripcio = ?, preu = ?, estoc = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdii", $nom, $descripcio, $preu, $estoc, $id);

    if ($stmt->execute()) {
        echo "Producte actualitzat correctament.";
    } else {
        echo "Error actualitzant el producte: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>