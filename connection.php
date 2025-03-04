<?php
$servername = "localhost";
$DBusername = "root";
$password= "";
$dbname = "jardineria";

$conn = new mysqli($servername, $DBusername, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>