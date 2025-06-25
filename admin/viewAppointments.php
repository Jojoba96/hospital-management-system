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
$sql_appointments = "SELECT * FROM appointments"; // Query to fetch appointments
$query_appointments = mysqli_query($conn, $sql_appointments);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            direction: ltr;
            text-align: left;
            background-color: #edf3fa;
        }

        /* Sidebar Styling */
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #2c3e50;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            color: #ecf0f1;
        }

        .sidebar img {
            width: 80%;
            margin: 0 auto 20px;
            border-radius: 10px;
            border: 3px solid #007bff;
            display: block;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #ecf0f1;
            display: block;
        }

        .sidebar a:hover {
            background-color: #34495e;
            color: #ecf0f1;
        }

        /* Page Content */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        th,
        td {
            text-align: center;
            background: #edf3fa;
        }

        /* Button styles */
        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<!-- Sidebar -->
<?php
if (!@include('sidebar.php')) {
    error_log('Failed to include sidebar.php');
    echo '<div class="alert alert-danger">Sidebar navigation failed to load</div>';
}
?>

<!-- Main Content -->
<div class="content">
    <h3>View Appointments</h3>
    <div class="table-container">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="appointmentsTableBody">
                <?php foreach ($query_appointments as $row_appointment) {
                    $patient_id = $row_appointment['patient_id'];
                    $sql_patient = "SELECT * FROM users WHERE id = $patient_id";
                    $query_patient = mysqli_query($conn, $sql_patient);
                    foreach ($query_patient as $row_patient) {
                        $patient_name = $row_patient['name'];
                    }

                    $doctor_id = $row_appointment['doctor_id'];
                    $sql_doctor = "SELECT * FROM users WHERE id = $doctor_id";
                    $query_doctor = mysqli_query($conn, $sql_doctor);
                    foreach ($query_doctor as $row_doctor) {
                        $doctor_name = $row_doctor['name'];
                    }
                ?>
                <tr>
                    <td><?= $patient_name; ?></td>
                    <td><?= $doctor_name; ?></td>
                    <td><?= $row_appointment['date']; ?></td>
                    <td><?= $row_appointment['time']; ?></td>
                    <td><a style="text-decoration: none;" class="btn-delete" href="appointment-delete.php?id=<?=$row_appointment['id'];?>">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
