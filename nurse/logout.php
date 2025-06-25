<?php
include("../conn.php");
session_start();            
session_unset();            
session_destroy();          

// After destroying the session, redirect to login page
header("Location: ../login.php");
exit();
?>