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
$sql_users = "SELECT * FROM users WHERE role_id = 3"; // Changed to show patients (role_id = 3)
$query_users = mysqli_query($conn, $sql_users);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Medical History</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

           /* Sidebar */
           .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            background-color: #2c3e50; /* Dark blue sidebar */
            color: #fff;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 15px 20px;
            transition: 0.3s;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color:rgb(81, 112, 145);
            color: #fff;
            border-radius: 5px;
        }


        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .dashboard-header {
            background-color:rgb(81, 112, 145);
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
        .upcoming-sessions {
            margin-top: 40px;
        }

        .table thead {
            background-color: #4e73df;
            color: white;
        }

        .table th, .table td {
            text-align: center;
        }

        .btn-secondary {
            background-color: #6c757d;
            width: 100%;
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
        <a href="cancelAppointments.php">Cancel Appointments</a>
        <a href="viewMedicalHistory.php" class="active">View Medical History</a>
        <a href="viewPatientProfiles.php">View Patient Profiles</a>
        
        <a href="logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="dashboard-header">
            <h2>Medical History</h2>
            <p>Review the medical history of your patients.</p>
        </div>

        <div class="container">
            <h3 class="mb-4">Patient Medical History</h3>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Medical History</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Get all patient medical histories
                    $sql_history = "SELECT ph.*, u.name
                                   FROM patient_histories ph
                                   JOIN users u ON ph.patient_id = u.id
                                   WHERE u.role_id = 3
                                   ORDER BY ph.id DESC";
                    $query_history = mysqli_query($conn, $sql_history);
                    
                    if(mysqli_num_rows($query_history) > 0) {
                        // Group results by patient
                        $histories = [];
                        while($row = mysqli_fetch_assoc($query_history)) {
                            $histories[$row['patient_id']][] = $row;
                        }
                        
                        // Display each patient's medical history
                        foreach($histories as $patient_id => $patient_histories) {
                            echo '<tr>';
                            echo '<td>'.$patient_histories[0]['name'].'</td>';
                            echo '<td>';
                            foreach($patient_histories as $history) {
                                echo '<p>'.$history['disease'].'</p>';
                            }
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="2">No medical history records found</td></tr>';
                    }
                    ?>
                </tbody>
            </table>

            <a href="doctorindex.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
