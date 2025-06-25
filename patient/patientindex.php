<?php
session_start();
if (!isset($_SESSION['id'])) {
  echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    exit();}
if ( $_SESSION['role_id'] != 3) {
  echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
   exit();}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient's Home Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            direction: ltr;
            background-image: url('../assets/back.PNG'); /* Background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            color: #fff;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            background-color: #2c3e50; /* gray sidebar */
            color: #fff;
            padding-top: 20px;
            z-index: 100;
            border-right: 3px solid #007bff;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 15px 20px;
            transition: 0.3s;
        }

       
        .sidebar img {
            border-radius: 8px;
            border: 4px solid #007bff;
            margin: 10px auto;
            display: block;
            max-width: 80%;
        }
        .sidebar a:hover {
            background-color:  #34495e;
            color: #fff;
            border-radius: 5px;
        }
        /* Main content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 100px;
            padding-top: 100px;
            text-align: center;
        }

        h2 {
            font-size: 2rem;
            color: #fff;
        }

        /* Navbar customizations */
        .navbar-nav .nav-link {
            color: #fff;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.7); /* Dark background for navbar */
        }

        /* Additional styles for the content images */
        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            border: 4px solid #007bff;
            margin-top: 20px;
        }
    </style>
</head>
<body>









<!-- Sidebar 


<?php
if (!@include('sidebar.php')) {
    error_log('Failed to include sidebar.php');
    echo '<div class="alert alert-danger">Sidebar navigation failed to load</div>';
}
?>
<div class="sidebar">
    <h4 class="text-center">Patient Portal</h4>
    <img src="../assets/image1.png" alt="Patient Avatar" class="img-fluid mb-3">
    <a href="patientindex.php" class="active">Home</a>
    <a href="bookAppointment.php">Book Appointment</a>
    <a href="viewAppointments.php">View Appointments</a>
    <a href="cancelAppointments.php">Cancel Appointments</a>
    <a href="updateProfile.php">Update Profile</a>
    <a href="logout.php">Logout</a>
</div>   -->

<!-- Main Content -->
<div class="main-content">
    <h2 class="mb-4">Welcome to the Patient Portal</h2>
    <p>Through this page, you can navigate to various options available to manage your appointments and track your medical condition.</p>
    <img src="../assets/image2.png" alt="Welcome Image" class="img-fluid mb-4" style="max-height: 250px; object-fit: cover;">
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
