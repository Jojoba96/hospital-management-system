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
$sql_users = "SELECT * FROM users WHERE role_id = 2"; // Doctors
$query_users = mysqli_query($conn, $sql_users);

$sql_history = "SELECT * FROM medical_histories ORDER BY medical_histories.id DESC";
$query_history = mysqli_query($conn, $sql_history);

if (isset($_POST['save_btn'])) {
    $doctor_id = $_POST['doctor'];
    $specialization = $_POST['specialization'];
    $year = $_POST['year'];
    $sql_insert = "INSERT INTO medical_histories(`year`, `specialization`, `doctor_id`) VALUES($year, '$specialization', $doctor_id)";
    if ($query_insert = mysqli_query($conn, $sql_insert)) {
        header("refresh:0");
    } else {
        echo "Sorry, the addition was not successful.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical History</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            direction: ltr;
            text-align: left;
            background-color: #edf3fa;
        }

        /* Sidebar Style */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            background-color: #1d2124;
            color: #fff;
            padding-top: 20px;
            z-index: 100;
            border-right: 3px solid #007bff;
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
            border: 3px solid #007bff;
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

        .content-header {
            margin-top: 20px;
            text-align: center;
        }

        /* Table Styling */
        th,
        td {
            text-align: center;
            background: #edf3fa;
        }

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

        /* Add Patient Form Modal */
        .modal-body {
            padding: 30px;
        }

        /* Button Styling */
        .custom-button {
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            margin: 10px;
            transition: all 0.3s ease;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .custom-button:hover {
            background-color: #0056b3;
        }

        .button-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .button-container .custom-button {
            width: 250px;
        }

        .custom-button img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-header">
            <h2>Specializations</h2>
            <button class="btn btn-primary mb-3" onclick="showForm()">Add Speciality</button>
        </div>
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Specialization</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="medicalHistoryTableBody">
                    <?php
                    foreach ($query_history as $row_history) {
                        $doctor_id = $row_history['doctor_id'];
                        $sql_doctor = "SELECT * FROM users WHERE id = $doctor_id";
                        $query_doctor = mysqli_query($conn, $sql_doctor);
                        foreach ($query_doctor as $row_doctor) {
                            $doctor_name = $row_doctor['name'];
                        }
                    ?>
                        <tr>
                            <td><?= $doctor_name; ?></td>
                            <td><?= $row_history['specialization'] ?></td>
                            <td><?= $row_history['year']; ?></td>
                            <td>
                                <a style="text-decoration: none;" class="btn-delete" href="history-delete.php?id=<?= $row_history['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Add Speciality </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="dataForm" action="viewMedicalHistory.php" method="POST">
                        <div class="form-group">
                            <label for="doctorName">Doctor</label>
                            <select class="form-control" name="doctor" id="doctorName" required>
                                <?php foreach ($query_users as $row_user) { ?>
                                    <option value="<?= $row_user['id'] ?>"> <?= $row_user['name']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="specialization">Specialization</label>
                            <input type="text" class="form-control" name="specialization" id="specialization" required>
                        </div>
                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="number" class="form-control" name="year" id="year" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="save_btn">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function showForm() {
            $('#formModal').modal('show');
        }

        function addRecord() {
            const doctorName = document.getElementById("doctorName").value;
            const specialty = document.getElementById("specialty").value;
            const year = document.getElementById("year").value;

            const tableBody = document.getElementById("medicalHistoryTableBody");
            const newRow = tableBody.insertRow();
            newRow.innerHTML = `
                <td>${doctorName}</td>
                <td>${specialty}</td>
                <td>${year}</td>
                <td><button class="btn-delete" onclick="deleteRow(this)">Delete</button></td>
            `;

            $('#formModal').modal('hide');
            document.getElementById("dataForm").reset();
        }

        function deleteRow(button) {
            if (confirm("Are you sure you want to delete this record?")) {
                button.parentNode.parentNode.remove();
            }
        }
    </script>
</body>

</html>
