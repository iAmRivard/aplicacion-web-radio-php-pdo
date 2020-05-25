<?php 
    session_start();
    $_SESSION["activo"] = false;
    session_destroy();

    header("Location: ../inicio.php");
    
?>