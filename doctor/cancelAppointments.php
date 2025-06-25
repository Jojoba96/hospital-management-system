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
$sql_appointments = "SELECT * FROM appointments WHERE doctor_id = $id";
$query_appointments = mysqli_query($conn, $sql_appointments);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Appointments</title>
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
            background-color: #2c3e50;
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
            background-color: rgb(81, 112, 145);
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .table {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            text-align: center;
            padding: 15px;
        }

        .table thead {
            background-color: #007bff;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-secondary {
            margin-top: 15px;
            background-color: #6c757d;
        }
        /* Responsive image sizes */
        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        /* Image Style */
        .sidebar img, .dashboard-header img, .upcoming-sessions img {
            border-radius: 8px;
            border: 4px solid #007bff;
            margin: 0 auto;
            display: block;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
    <h4 class="text-center">Doctor Dashboard</h4>
    <img src="../assets/image1.png" alt="Doctor Image" class="img-fluid mb-3" style="width: 80%;">
        <a href="doctorindex.php">Dashboard</a>
        <a href="viewAccount.php">View Account</a>
        <a href="viewAppointments.php">View Appointments</a>
        <a href="cancelAppointments.php" class="active">Cancel Appointments</a>
        <a href="viewMedicalHistory.php">View Medical History</a>
        <a href="viewPatientProfiles.php">View Patient Profiles</a>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="dashboard-header">
            <h2>Cancel Appointments</h2>
            <p>Manage and cancel your scheduled appointments.</p>
        </div>

        <!-- Appointments Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query_appointments as $row_appointment) {
                        $patient_id = $row_appointment['patient_id'];
                        $sql_patient = "SELECT * FROM users WHERE id = $patient_id";
                        $query_patient = mysqli_query($conn, $sql_patient);
                        foreach ($query_patient as $row_patient) {
                            $patient_name = $row_patient['name'];
                        }
                    ?>
                        <tr>
                            <td><?= $patient_name; ?></td>
                            <td><?= $row_appointment['date']; ?></td>
                            <td><?= $row_appointment['time']; ?></td>
                            <td>
                                <a href="appointment-delete.php?id=<?= $row_appointment['id']; ?>" class="btn btn-danger btn-sm">Cancel</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <a href="doctorindex.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
