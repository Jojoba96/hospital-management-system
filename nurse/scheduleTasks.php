<?php
include("../conn.php");
session_start();
//if (!isset($_SESSION['id'])) {
  //  echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    //exit();
//}
//if (isset($_SESSION['role_id']) && $_SESSION['role_id'] != 4) {
  //  echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    //exit();
//}
$id = isset($_SESSION['id']) ? $_SESSION['id'] : 0;
$sql_tasks = "SELECT * FROM tasks WHERE tasks.nurse_id = $id ORDER BY tasks.id DESC";
$query_tasks = mysqli_query($conn, $sql_tasks);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Scheduling</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-image: url('../assets/nurse.jpg'); 
            background-size: cover; 
            background-position: center; 
            margin: 0;
            padding: 0;
            direction: ltr; 
            color: #fff; 
        }
        
        /* Sidebar style */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
            z-index: 100;
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
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            padding-top: 100px;
            text-align: center;
        }

        table { 
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 8px;
        }

        .navbar-nav .nav-link { 
            color: #fff; 
            font-weight: bold; 
            transition: all 0.3s ease; 
        }

        .navbar-nav .nav-link:hover { 
            color: #007bff; 
        }

        /* Custom header */
        h2 {
            font-size: 2rem;
            color: #fff;
        }

    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center">Nurse Dashboard</h4>
    <a href="nurseDashboard.php" class="active">Dashboard</a>
    <a href="viewPatients.php">View Patients</a>
    <a href="scheduleTasks.php">Schedule Tasks</a>
    <a href="logout.php">Logout</a>
</div>

<!-- Main Content -->
<div class="main-content">
    <h2>Task Scheduling</h2>
    <p>A list of scheduled tasks for each patient.</p>
    
    <table class="table table-bordered mt-4">
        <thead class="thead-light">
            <tr>
                <th>Doctor</th>
                <th>Nurse</th>
                <th>Task</th>
                <th>Time</th>
                <th>Frequency</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(mysqli_num_rows($query_tasks) > 0) {
                    foreach ($query_tasks as $row_task) { 
                        $doctor_id = isset($row_task['doctor_id']) ? $row_task['doctor_id'] : 0;
                        $sql_doctor = "SELECT * FROM users WHERE users.id = $doctor_id";
                        $query_doctor = mysqli_query($conn,$sql_doctor);
                        $doctor_name = "";
                        if(mysqli_num_rows($query_doctor) > 0) {
                            foreach($query_doctor as $row_doctor) {
                                $doctor_name = isset($row_doctor['name']) ? $row_doctor['name'] : '';
                            }
                        }
                        
                        $nurse_id = isset($row_task['nurse_id']) ? $row_task['nurse_id'] : 0;
                        $sql_nurse = "SELECT * FROM users WHERE users.id = $nurse_id";
                        $query_nurse = mysqli_query($conn,$sql_nurse);
                        $nurse_name = "";
                        if(mysqli_num_rows($query_nurse) > 0) {
                            foreach($query_nurse as $row_nurse) {
                                $nurse_name = isset($row_nurse['name']) ? $row_nurse['name'] : '';
                            }
                        }
            ?>
                <tr>
                    <td><?= $doctor_name; ?></td>
                    <td><?= $nurse_name; ?></td>
                    <td><?= isset($row_task['name']) ? $row_task['name'] : ''; ?></td>
                    <td><?= isset($row_task['time']) ? $row_task['time'] : ''; ?></td>
                    <td><?= isset($row_task['frequent']) ? $row_task['frequent'] : ''; ?></td>
                </tr>
            <?php 
                    }
                } else {
            ?>
                <tr>
                    <td colspan="5" class="text-center">No tasks scheduled yet.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
