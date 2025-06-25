<?php
include("../conn.php");
session_start();
if (!isset($_SESSION['id'])) {
    echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    exit();
}
if ( $_SESSION['role_id'] != 3) {
    echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    exit();
}
$id = $_SESSION['id'];
$sql_appointments = "SELECT * FROM appointments WHERE patient_id = $id ";
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
            border-radius: 10px;
            padding-top: 100px;
            text-align: center;
        }

        h2 {
            font-size: 2rem;
            color: #fff;
        }

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

        table {
            margin-top: 30px;
        }

        th,
        td {
            text-align: center;
            background: #edf3fa;
        }

        .cancel-btn {
            color: #fff;
            background-color: #dc3545;
            border: none;
        }

        .cancel-btn:hover {
            background-color: #c82333;
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
    <div class="main-content container">
        <h2 class="mb-4" style="color:#000;">Cancel Appointments</h2>
        <p style="color:#000;">You can cancel your listed appointments by clicking on the "Cancel" button.</p>
        <div class="container">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Appointment Date</th>
                        <th>Time</th>
                        <th>Doctor Name</th>
                        <th>Specialization</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query_appointments as $row_appointment) {
                        $doctor_id = $row_appointment['doctor_id'];
                        $sql_doctor = "SELECT * FROM users WHERE id = $doctor_id";
                        $query_doctor = mysqli_query($conn, $sql_doctor);
                        foreach ($query_doctor as $row_doctor) {
                            $doctor_name = $row_doctor['name'];
                        }
                        $sql_doctor_history = "SELECT * FROM medical_histories WHERE doctor_id = $doctor_id";
                        $query_doctor_history = mysqli_query($conn, $sql_doctor_history);
                    ?>
                        <tr>
                            <td><?= $row_appointment['date'] ?></td>
                            <td><?= $row_appointment['time'] ?></td>
                            <td><?= $doctor_name; ?></td>
                            <td>
                                <?php foreach ($query_doctor_history as $row_doctor_history) {
                                    echo $row_doctor_history['specialization'] . '  ';
                                } ?>
                            </td>
                            <td><a href="appointment-delete.php?id=<?= $row_appointment['id']; ?>" class="btn cancel-btn">Cancel</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br>
        <br>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
