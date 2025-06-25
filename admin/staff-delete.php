<?php
include("../conn.php");
// if ( $_SESSION['role_id'] != 1) {
//     echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
//     exit();
// }
$user_id = $_GET['id'];
$sql_delete = "DELETE FROM users WHERE id = $user_id";
$query_delete = mysqli_query($conn,$sql_delete);
header("location:manageUsers.php");
?>