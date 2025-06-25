<?php
include("../conn.php");
session_start();
if (!isset($_SESSION['id'])) {
    echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    exit();
}
if ( $_SESSION['role_id'] != 2) {
    echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    exit();
}
$id = $_SESSION['id'];
$sql_tasks = "SELECT * FROM tasks WHERE doctor_id = $id";
$query_tasks = mysqli_query($conn, $sql_tasks);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Schedule</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 15px 20px;
            transition: 0.3s;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: rgb(81, 112, 145);
            color: #fff;
            border-radius: 5px;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .dashboard-header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

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

        .btn {
            background-color: #007bff;
            color: white;
        }

        .btn-delete {
            background-color: #ff0000;
            color: white;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Doctor Dashboard</h4>
        <a href="doctorindex.php">Dashboard</a>
        <a href="viewAccount.php">View Account</a>
        <a href="viewAppointments.php">View Appointments</a>
        <a href="cancelAppointments.php">Cancel Appointments</a>
        <a href="viewMedicalHistory.php">View Medical History</a>
        <a href="addTask.php">Add Task for Nurses</a>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="dashboard-header">
            <h2>Task Schedule</h2>
            <p>View and manage tasks for nurses and patients.</p>
        </div>

        <!-- Button to add a new task -->
        <a href="addtaskform.php" class="btn btn-success mt-4 mb-4">Add New Task</a>

        <!-- Task Table -->
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Nurse</th>
                    <th>Task</th>
                    <th>Time</th>
                    <th>Frequency</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($query_tasks as $row_task) {
                    $patient_id = $row_task['patient_id'];
                    $sql_patient = "SELECT * FROM users WHERE id = $patient_id";
                    $query_patient = mysqli_query($conn, $sql_patient);    
                    foreach ($query_patient as $row_patient) {
                        $patient_name = $row_patient['name'];
                    }
                    $nurse_id = $row_task['nurse_id'];
                    $sql_nurse = "SELECT * FROM users WHERE id = $nurse_id";
                    $query_nurse = mysqli_query($conn, $sql_nurse);    
                    foreach ($query_nurse as $row_nurse) {
                        $nurse_name = $row_nurse['name'];
                    }
                ?>
                    <tr>
                        <td><?= $patient_name; ?></td>
                        <td><?= $nurse_name; ?></td>
                        <td><?= $row_task['name']; ?></td>
                        <td><?= $row_task['time']; ?></td>
                        <td><?= $row_task['frequent']; ?></td>
                        <td><a class="btn btn-delete" href="task-delete.php?id=<?= $row_task['id']; ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
