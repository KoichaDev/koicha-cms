<?php 
    session_start();
    // Destroys all data registered to a session
    session_destroy();
    header("Location: ../index.php");
?>