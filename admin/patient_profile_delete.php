<?php
include("../conn.php");
session_start();
if (!isset($_SESSION['id'])) {
    echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    exit();
}
if ( $_SESSION['role_id'] != 1) {
    echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    exit();
}
$id = $_GET['id'];
$sql_delete = "DELETE FROM patient_histories WHERE id = $id";
$query_delete = mysqli_query($conn,$sql_delete);
header("location:viewPatientProfiles.php");
?>