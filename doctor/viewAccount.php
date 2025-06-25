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
$sql_user = "SELECT * FROM users WHERE id = $id";
$query_user = mysqli_query($conn, $sql_user);

foreach($query_user as $row_user) {
    $name = $row_user['name'];
    $phone = $row_user['phone'];
    $email = $row_user['email'];
    $password = $row_user['password'];
}

if(isset($_POST['save_btn'])) {
    $name_ = $_POST['name'];
    $phone_ = $_POST['phone'];
    $email_ = $_POST['email'];
    $password_ = $_POST['password'];
    $sql_update = "UPDATE users SET name='$name_',email='$email_',password='$password_',phone='$phone_' WHERE id = $id";
    if($query_update = mysqli_query($conn,$sql_update)) {
        header("refresh:0");
    } else {
        echo "Sorry, the account was not updated successfully.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
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
            background-color:rgb(81, 112, 145);
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .account-card {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #e3e6f0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .account-card h3 {
            color: #4e73df;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            width: 100%;
            background-color: #4e73df;
            border: none;
        }

        .btn-secondary {
            width: 100%;
            margin-top: 10px;
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
        <a href="viewAccount.php" class="active">View Account</a>
        <a href="viewAppointments.php">View Appointments</a>
        <a href="cancelAppointments.php">Cancel Appointments</a>
        <a href="viewMedicalHistory.php">View Medical History</a>
        <a href="viewPatientProfiles.php">View Patient Profiles</a>
       
        <a href="logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="dashboard-header">
            <h2>Account Details</h2>
            <p>View and update your account details.</p>
        </div>

        <form action="viewAccount.php" method="POST">
            <div class="account-card">
                <h3>Account Information</h3>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $name; ?>" required />
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $email; ?>" required />
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" name="phone" id="phone" class="form-control" value="<?= $phone; ?>" required />
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" value="<?= $password; ?>" required />
                </div>
                <button name="save_btn" type="submit" class="btn btn-primary">Update Account</button>
                <a href="doctorindex.php" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </form>
    </div>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
