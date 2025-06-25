<?php
session_start();
//if (!isset($_SESSION['id'])) {
  //  echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    //exit();
//}
//if (isset($_SESSION['role_id']) && $_SESSION['role_id'] != 4) {
  //  echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    //exit();
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurse Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-image: url('../assets/nurse.jpg'); 
            background-size: cover; 
            background-position: center; 
            direction: ltr; 
            text-align: center; 
            color: #fff;
            margin: 0;
            padding: 0;
        }

        /* Sidebar style */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            background-color: #1d2124; /* Dark sidebar */
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

        .sidebar a:hover, .sidebar a.active {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
        }

        /* Main content area */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6); 
            border-radius: 10px;
            padding-top: 100px;
            text-align: center;
        }

        .dashboard-header h2 {
            font-size: 2rem;
            color: #fff;
        }

        /* Stat cards */
        .stats-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .stat-card {
            flex: 1;
            background-color: #fff;
            margin: 10px;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .stat-card h4 {
            margin: 10px 0;
            color: #007bff;
        }

        .stat-card p {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
        }

        /* Table Style */
        table {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table thead {
            background-color: #007bff;
            color: #fff;
        }

        table td, table th {
            padding: 15px;
            text-align: center;
        }

        /* Image Styles */
        .sidebar img, .main-content img {
            border-radius: 8px;
            border: 4px solid #007bff;
            margin: 10px auto;
            display: block;
            max-width: 80%;
        }

        /* Responsive image sizes */
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center">Nurse Dashboard</h4>
    <img src="../assets/image1.png" alt="Nurse Image" class="img-fluid mb-3">
    <a href="nurseDashboard.php" class="active">Dashboard</a>
    <a href="viewPatients.php">View Patients</a>
    <a href="scheduleTasks.php">Schedule Tasks</a>
    <a href="logout.php">Logout</a>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="dashboard-header">
        <h2>Welcome to the Nurse Dashboard</h2>
        <p>This page allows you to navigate to various options for managing your daily tasks and patient care.</p>
        <img src="../assets/image2.png" alt="Nurse Care" class="img-fluid mb-3" style="max-height: 250px; object-fit: cover;">
    </div>

    <div class="stats-container">
        <div class="stat-card">
            <h4>Total Patients</h4>
            <p>10</p>
        </div>
        <div class="stat-card">
            <h4>Tasks Scheduled</h4>
            <p>5</p>
        </div>
        <div class="stat-card">
            <h4>Upcoming Appointments</h4>
            <p>3</p>
        </div>
        <div class="stat-card">
            <h4>Today's Tasks</h4>
            <p>2</p>
        </div>
    </div>

    <div class="upcoming-sessions">
        <h3>Upcoming Sessions</h3>
        <img src="../assets/image3.png" alt="Upcoming Sessions" class="img-fluid mb-4" style="max-height: 250px; object-fit: cover;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Session Title</th>
                    <th>Scheduled Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Patient 1 Checkup</td>
                    <td>Nov 17, 2024</td>
                    <td>10:00 AM</td>
                </tr>
                <tr>
                    <td>Patient 2 Checkup</td>
                    <td>Nov 17, 2024</td>
                    <td>02:00 PM</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
