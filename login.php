
<?php
session_start();
include("conn.php");

if (isset($_POST['login_btn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['role_id'] = $user['role_id'];

            switch ($user['role_id']) {
                case 1:
                    header("Location: admin/adminindex.php");
                    break;
                case 2:
                    header("Location: doctor/doctorindex.php");
                    break;
                case 3:
                    header("Location: patient/patientindex.php");
                    break;
                case 4:
                    header("Location: nurse/nurseDashboard.php");
                    break;
                default:
                    echo "<script>alert('❌ Unknown role. Contact admin.');</script>";
            }
        } else {
            echo "<script>alert('❌ Incorrect password!');</script>";
        }
    } else {
        echo "<script>alert('❌ Email not found!');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('assets/back.PNG') no-repeat center center fixed;
            background-size: cover;
            color: #333;
        }

        /* Overlay for readability */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }

        /* Top Appbar */
        .appbar {
            background-color: #1e293b;
            padding: 15px 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f8fafc;
            font-size: 20px;
            font-weight: bold;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            margin: 100px auto;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h3 {
            color: #1e293b;
            margin-bottom: 30px;
        }

        .form-group {
            position: relative;
        }

        .form-group i {
            position: absolute;
            left: 15px;
            top: 12px;
            color: #1e293b;
        }

        .form-control {
            padding-left: 40px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            width: 100%;
            background-color: #007bff;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .text-center a {
            color: #007bff;
        }

        .text-center a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .illustration img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            color: #f8fafc;
            font-size: 0.9rem;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #38bdf8;
            text-decoration: none;
            font-weight: bold;
        }

        footer a:hover {
            color: #0284c7;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                padding: 20px;
                margin: 50px auto;
            }

            footer {
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <!-- Top Appbar -->
    <div class="appbar">
        Welcome to HealthCare Login
    </div>

    <!-- Login Container -->
    <div class="login-container">
        <!-- Illustration -->
        <div class="illustration">
            <img src="assets/medical.png" alt="Medical Illustration">
        </div>

        <!-- Login Form -->
        <h3>Login</h3>
        <form action="login.php" method="POST">
            <!-- Email Field -->
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" name="password" id="password" minlength="8" placeholder="Enter your password" required>
            </div>

            <!-- Login Button -->
            <button type="submit" name="login_btn" class="btn btn-primary">Login</button>

            <!-- <p class="text-center mt-3">
                Don't have an account? <a href="register.php">Create an account</a>
            </p> -->
        </form>
    </div>

    <!-- Footer Section -->
    <footer>
        © 2025 Health Care Portal. All rights reserved. | 
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
