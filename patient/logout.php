<?php
include("conn.php");
session_start();            
session_unset();            
session_destroy();          

if (!isset($_SESSION['id']) || $_SESSION['role_id'] != 3) {
    header("Location: ../login.php");
    exit();
}
?>