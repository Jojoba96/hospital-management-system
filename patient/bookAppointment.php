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
$sql_doctors = "SELECT * FROM users WHERE role_id = 2";
$query_doctors = mysqli_query($conn, $sql_doctors);

if (isset($_POST['save_btn'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $doctor_id = $_POST['doctor'];

    $sql_insert = "INSERT INTO appointments(`date`,`time`,patient_id,doctor_id) VALUES('$date','$time','$id','$doctor_id')";
    if ($query_insert = mysqli_query($conn, $sql_insert)) {
        echo "<script>alert('Appointment successfully added')</script>";
    } else {
        echo "<script>alert('Sorry, the entry was not successful')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
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
            border-radius: 100px;
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
        <h2 class="mb-4" style="color: #000;">Book an Appointment</h2>
        <form action="bookAppointment.php" method="POST">
            <div class="form-group">
                <label for="appointmentDate" style="color: #000;">Appointment Date</label>
                <input type="date" min="<?= date('Y-m-d'); ?>" name="date" class="form-control" id="appointmentDate" required>
            </div>
            <div class="form-group">
                <label for="appointmentTime" style="color: #000;">Appointment Time</label>
                <input type="time" name="time" class="form-control" id="appointmentTime" required>
            </div>
            <div class="form-group">
                <label for="doctor" style="color: #000;">Doctor</label>
                <select class="form-control" name="doctor" id="doctor" required>
                    <?php foreach ($query_doctors as $row_doctor) { ?>
                        <option value="<?= $row_doctor['id']; ?>"> <?= $row_doctor['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="save_btn" class="btn btn-primary mt-3">Book Appointment</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
