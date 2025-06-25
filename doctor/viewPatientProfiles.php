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
$sql_patients = "SELECT * FROM patient_histories ORDER BY id DESC ";
$query_patients = mysqli_query($conn, $sql_patients);

$sql_users = "SELECT * FROM users WHERE role_id = 3 ORDER BY id DESC";
$query_users = mysqli_query($conn, $sql_users);

if (isset($_POST['save_btn'])) {
    $patient_id = $_POST['patient'];
    $age = $_POST['age'];
    $disease = $_POST['disease'];
    
    // Use prepared statement to prevent SQL injection
    $sql_insert = "INSERT INTO patient_histories(disease, age, patient_id) VALUES(?, ?, ?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("sis", $disease, $age, $patient_id);
    
    if($stmt->execute()){
        header("refresh:0");
    }
    else{
        echo "<script>alert('The medical case was not added successfully')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient Files</title>
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
            background-color: #2c3e50;
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

        .sidebar a:hover{
            background-color:rgb(50, 68, 89);
            color: #fff;
            border-radius: 5px;
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
        th, td { text-align: center; background: #edf3fa;}
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
<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center">Doctor Dashboard</h4>
    <img src="../assets/image1.png" alt="Doctor Image" class="img-fluid mb-3" style="width: 80%;">
    <a href="doctorindex.php" class="active">Dashboard</a>
    <a href="viewAccount.php">View Account</a>
    <a href="viewAppointments.php">View Appointments</a>
    <a href="cancelAppointments.php">Cancel Appointments</a>
    <a href="viewMedicalHistory.php">View Medical History</a>
    <a href="viewPatientProfiles.php">View Patient Profiles</a>
   <!-- <a href="addTask.php">Add Task for Nurses</a> -->
    <a href="logout.php">Logout</a>
</div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-header">
            <h2>View Patient Files</h2>
            <button class="btn btn-primary mb-3" onclick="showForm()">Add Patient</button>
        </div>
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Medical Case</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="patientTableBody">
                    <?php foreach($query_patients as $row_patients){
                        $patient_id = $row_patients['patient_id'];
                        $sql_patient = "SELECT * FROM users WHERE id = $patient_id";
                        $query_patient = mysqli_query($conn, $sql_patient);
                        foreach($query_patient as $row_patient)
                        {
                            $patient_name = $row_patient['name'];
                            $patient_email = $row_patient['email'];
                        }
                    ?>
                    <tr>
                        <td><?= $patient_name; ?></td>
                        <td><?= $patient_email; ?></td>
                        <td><?= $row_patients['age']; ?></td>
                        <td><?= $row_patients['disease']; ?></td>
                        <td>
                            <a class="btn-delete" href="patient_profile_delete.php?id=<?= $row_patients['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Patient Form Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Add Patient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="dataForm" action="viewPatientProfiles.php" method="POST">
                        <div class="form-group">
                            <label for="patientName">Patient Name</label>
                            <select name="patient" class="form-control" id="patientName" required>
                                <?php foreach($query_users as $row_user){ ?>
                                    <option value="<?= $row_user['id']; ?>"> <?= $row_user['name']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" name="age" id="age" required>
                        </div>
                        <div class="form-group">
                            <label for="disease">Medical Case</label>
                            <input type="text" class="form-control" name="disease" id="disease" required>
                        </div>
                        <button name="save_btn" type="submit" class="btn btn-primary">Save</button>
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
    </script>
</body>
</html>
