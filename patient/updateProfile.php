<?php
include("../conn.php");
session_start();
if (!isset($_SESSION['id'])) {
   echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    exit();}
if ( $_SESSION['role_id'] != 3) {
   echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    exit();}
    
$id = $_SESSION['id'];
$sql_user = "SELECT * FROM users WHERE id = $id ";
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
    $sql_update = "UPDATE users SET name='$name_',email='$email_',password='$password_',phone='$phone_' WHERE id  = $id";
    if($query_update = mysqli_query($conn,$sql_update))
    {
        header("refresh:0");
    }
    else
    {
        echo "Sorry, account update failed.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
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

        .card-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 80vh; 
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-card {
            max-width: 800px;
            width: 100%;
            background-color: #edf3fa;
            border: 1px solid #e3e6f0;
            border-radius: 8px;
            padding: 20px;
        }

        .profile-card h3 {
            color: #4e73df;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .profile-info .form-group {
            margin-bottom: 15px;
        }

        .profile-card .btn {
            width: 100%;
            background-color: #4e73df;
            color: #ffffff;
        }

        .profile-card .btn:hover {
            background-color: #2e59d9;
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
        <h2 class="mb-4" style="color:#000;">Update Profile</h2>
        <div class="card-container">
            <div class="profile-card">
                <h3>Update Your Profile</h3>
                <form action="updateProfile.php" method="POST">
                    <div class="account-card">
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
                                <input type="tel" name="phone" id="phone" class="form-control" value="<?= $phone; ?>" required />
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" value="<?= $password; ?>" required />
                            </div>
                        </div>
                        <button name="save_btn" type="submit" class="btn mt-3">Update Account</button>
                        <a href="patientindex.php" class="btn mt-3 mb-2">Back to Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
