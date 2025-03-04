<?php
    include 'connection.php';
    session_start();

    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $phone = isset($_SESSION['tlf']) ? $_SESSION['tlf'] : '';