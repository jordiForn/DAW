<?php
include 'connection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$isAdmin = false;
$isLoggedIn = false;

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    
    $sql = "SELECT rol FROM client WHERE nom_login = '$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $rol = $result->fetch_assoc()['rol'];

        if($rol === '1'){
            $isLoggedIn = true;
            $isAdmin = true;
            
        }else{
            $isLoggedIn = true;
        }
    }
}
?>
<script>
    let isAdmin = <?php echo json_encode($isAdmin); ?>;
    let isLoggedIn = <?php echo json_encode($isLoggedIn); ?>;
    console.log("isAdmin:", isAdmin);
    console.log("isLoggedIn:", isLoggedIn);
</script>