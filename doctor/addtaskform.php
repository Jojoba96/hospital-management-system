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
$sql_patients = "SELECT * FROM users WHERE users.role_id = 3";
$query_patients = mysqli_query($conn, $sql_patients);
$sql_nurses = "SELECT * FROM users WHERE users.role_id = 4";
$query_nurses = mysqli_query($conn, $sql_nurses);

if (isset($_POST['save_btn'])) {
    $patient = mysqli_real_escape_string($conn, $_POST['patient']);
    $nurse = mysqli_real_escape_string($conn, $_POST['nurse']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $frequent = mysqli_real_escape_string($conn, $_POST['frequent']);
    $sql_insert = "INSERT INTO tasks(`doctor_id`, `nurse_id`, `patient_id`, `name`, `time`, `frequent`) VALUES(?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_insert);
    mysqli_stmt_bind_param($stmt, 'iiisss', $id, $nurse, $patient, $name, $time, $frequent);
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("location:addTask.php");
    } else {
        echo "<script>alert('Failed to add task')</script>";
        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Task</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            direction: ltr;
            text-align: left;
            background-image: url('../assets/doctor.jpg'); /* Ensure this path is correct */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #000;
            padding-top: 50px;
        }

        .container {
            max-width: 600px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="container">
        <h4 class="text-center mb-4">Add New Task</h4>
        <form action="addtaskform.php" method="post">

            <div class="form-group">
                <label for="patientName">Patient</label>
                <select name="patient" class="form-control" id="patientName" required>
                    <?php foreach ($query_patients as $row_patient) { ?>
                        <option value="<?= $row_patient['id']; ?>"><?= $row_patient['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nurseName">Nurse</label>
                <select name="nurse" class="form-control" id="nurseName" required>
                    <?php foreach ($query_nurses as $row_nurse) { ?>
                        <option value="<?= $row_nurse['id']; ?>"><?= $row_nurse['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="taskType">Task Type</label>
                <input name="name" type="text" class="form-control" id="taskType" placeholder="Enter task type" required>
            </div>
            <div class="form-group">
                <label for="taskTime">Time</label>
                <input name="time" type="time" class="form-control" id="taskTime" required>
            </div>
            <div class="form-group">
                <label for="taskFrequency">Frequency</label>
                <select name="frequent" class="form-control" id="taskFrequency" required>
                    <option value="" disabled selected>Select frequency</option>
                    <option value="Daily">Daily</option>
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly">Monthly</option>
                </select>
            </div>
            <button name="save_btn" type="submit" class="btn btn-primary btn-block">Add Task</button>
        </form>
    </div>

    <!-- JavaScript scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
