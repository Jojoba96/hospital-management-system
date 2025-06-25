<?php
session_start();
//if (!isset($_SESSION['id'])) {
    //echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
  //  exit();
//}
//if ( $_SESSION['role_id'] != 1) {
  //  echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
   // exit();
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            background-color: #1d2124; /* Dark blue sidebar */
            color: #fff;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar img {
            display: block;
            width: 80%;
            margin: 0 auto 20px auto;
            border-radius: 10px;
            border: 4px solid #007bff;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 15px 20px;
            transition: 0.3s;
        }

       

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .dashboard-header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .button-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .custom-button {
            flex: 1;
            background-color: #fff;
            margin: 10px;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease-in-out;
        }

        .custom-button:hover {
            background-color:rgb(89, 102, 116);
            color: white;
        }

        .custom-button img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .custom-button h4 {
            margin: 0;
            color:rgb(53, 69, 87);
        }

        .custom-button:hover h4 {
            color: white;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<?php
if (!@include('sidebar.php')) {
    error_log('Failed to include sidebar.php');
    echo '<div class="alert alert-danger">Sidebar navigation failed to load</div>';
}
?>

<!-- Main Content -->
<div class="main-content">
    <div class="dashboard-header">
        <h2>Welcome to the Admin Dashboard</h2>
        <p>Navigate through the options on the sidebar to manage the system.</p>
    </div>
    <img src="../assets/image3.png" alt="Sessions Image" class="img-fluid mb-4" style="width: 100%; height: 250px; object-fit: cover; border-radius: 12px; border: 4px solid #007bff;">
        
    <div class="button-container">
        <a href="manageUsers.php" class="custom-button">
            <img src="../assets/image1.png" alt="Register Icon">
            <h4>Manage Users</h4>
        </a>
        <a href="viewPatientProfiles.php" class="custom-button">
            <img src="../assets/image2.png" alt="Patient Icon">
            <h4>View Patient Profiles</h4>
        </a>
        <a href="viewMedicalHistory.php" class="custom-button">
            <img src="../assets/image3.png" alt="History Icon">
            <h4>View Specializations</h4>
        </a>
        <a href="viewAppointments.php" class="custom-button">
            <img src="../assets/image2.png" alt="Appointments Icon">
            <h4>View Appointments</h4>
        </a>
        <a href="logout.php" class="custom-button">
            <img src="../assets/image1.png" alt="Logout Icon">
            <h4>Logout</h4>
        </a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
