<?php
include("conn.php");
session_start();            
session_unset();            
session_destroy();          

if (!isset($_SESSION['id']) || $_SESSION['role_id'] != 2) {
    header("Location: ../login.php");
    exit();
}
?>