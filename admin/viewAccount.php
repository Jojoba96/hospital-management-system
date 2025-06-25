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
$id = $_GET['id'];
$sql_user = "SELECT * FROM users WHERE id = $id";
$query_user = mysqli_query($conn, $sql_user);

foreach($query_user as $row_user)
{
    $name = $row_user['name'];
    $phone = $row_user['phone'];
    $email = $row_user['email'];
    $password = $row_user['password'];
}

if(isset($_POST['save_btn']))
{
    $name_ = $_POST['name'];
    $phone_ = $_POST['phone'];
    $email_ = $_POST['email'];
    $password_ = $_POST['password'];
    $sql_update = "UPDATE users SET name='$name_', email='$email_', password='$password_', phone='$phone_' WHERE id = $id";
    if($query_update = mysqli_query($conn,$sql_update))
    {
        header("refresh:0");
    }
    else
    {
        echo "Sorry, the account was not updated successfully";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Account</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-nav .nav-link {
            color: #000;
            margin: 0 10px;
            padding: 10px 15px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: #007bff;
        }
        .card-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 80vh;
            background-color: #f8f9fa;
        }
        .account-card {
            max-width: 800px;
            width: 100%;
            background-color: #edf3fa;
            border: 1px solid #e3e6f0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .account-card h3 {
            color: #4e73df;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .account-info .form-group {
            margin-bottom: 15px;
        }
        .account-card .btn {
            width: 100%;
            background-color: #4e73df;
            color: #ffffff;
        }
    </style>
</head>
<body style="direction: ltr; text-align: left;">


    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
               
                <li class="nav-item">
                    <a class="nav-link" href="viewPatientProfiles.php">View Patient Profiles</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="viewMedicalHistory.php">Specializations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewAppointments.php">View Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

<form action="viewAccount.php?id=<?=$id;?>" method="POST" class="mt-5">
    <div class="card-container">
        <div class="account-card">
            <h3>View Account</h3>
            <div class="account-info">
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
                    <input style="text-align: left;" type="tel" name="phone" id="phone" class="form-control" value="<?= $phone; ?>" required />
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" value="<?= $password; ?>" required />
                </div>
            </div>
            <button name="save_btn" type="submit" class="btn mt-3">Update Account</button>
            <a href="adminindex.php" class="btn mt-3 mb-2">Back to Dashboard</a>
        </div>
    </div>
</form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
