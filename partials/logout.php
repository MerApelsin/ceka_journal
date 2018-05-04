<?php 
    header('Location: ../index.php');
    require_once 'session_start.php';
    
    session_destroy();
?>