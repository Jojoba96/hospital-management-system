<?php
include("conn.php");
session_start();
if (!isset($_SESSION['id'])) {
    echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    exit();
}
if ( $_SESSION['role_id'] != 1) {
    echo "<script>alert('Unauthorized access. Please login.'); window.location.href='../login.php';</script>";
    exit();
}
$sql_roles = "SELECT * FROM roles WHERE id != 1";
$query_roles = mysqli_query($conn, $sql_roles);
if (isset($_POST['register_btn'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $phone = trim($_POST['phone']);
    $role = $_POST['role'];

    $check_query = "SELECT id FROM users WHERE name = ? OR email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('❌ Error: Name or Email already exists! Please choose a different one.');</script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sql_insert = "INSERT INTO users (name, email, password, phone, role_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bind_param("ssssi", $name, $email, $hashed_password, $phone, $role);
        if ($stmt->execute()) {
            echo "<script>alert('✅ Registration Successful!'); window.location.href='admin/adminindex.php';</script>";
        } else {
            echo "<script>alert('❌ Account creation failed. Please try again.');</script>";
        }
    
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
    <title>Create New Account</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* إعداد الخلفية */
        /* إعداد الخلفية */
body {
    background: url('assets/back.PNG') no-repeat center center fixed;
    background-size: cover;
    position: relative;
    min-height: 100vh;
}

/* طبقة شفافية */
body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.7); /* الخلفية ذات الشفافية */
    z-index: -1;
}

.register-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 900px;
    margin: 50px auto;
    padding: 0;
    background-color: transparent;
    border-radius: 12px; /* إضافة التدوير لتنعيم الحواف */
}

.register-form {
    flex: 1;
    padding: 30px;
    background-color: rgba(255, 255, 255, 0.9); /* خلفية ناعمة */
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border: none; /* إزالة الحدود */
}

.register-image {
    flex: 1;
    text-align: center;
    padding: 20px;
}

.register-image img {
    max-width: 100%;
    height: auto;
}

h3 {
    color: #007bff;
    margin-bottom: 30px;
    text-align: center;
}

.form-group {
    position: relative;
    margin-bottom: 15px;
}

.form-group i {
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: #007bff;
}

.form-control {
    padding-left: 40px;
    border-radius: 6px;
    border: 1px solid #007bff; /* تحديد الحدود للحقول */
    box-shadow: none; /* إزالة الظل من الحقول */
}

.form-control:focus {
    border-color: #0056b3; /* تغيير لون الحدود عند التحديد */
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

.footer {
    position: fixed;
    bottom: 20px;
    width: 100%;
    text-align: center;
    color: #333;
    font-size: 14px;
}

    </style>
</head>
<body>
    <!-- الحاوية الرئيسية -->
    <div class="container">
        <div class="register-container">
            <!-- صورة جانبية -->
            <div class="register-image">
                <img src="assets/medical.png" alt="Medical Image">
            </div>

            <!-- النموذج -->
            <div class="register-form">
                <h3>Create New Account</h3>
                <form method="POST" action="register.php">
                    <!-- Role selection -->
                    <div class="form-group">
                        <i class="fas fa-user-tag"></i>
                        <label for="userType">Choose Type:</label>
                        <select class="form-control" name="role" id="userType" required>
                            <?php foreach ($query_roles as $row_role) { ?>
                                <option value="<?= $row_role['id']; ?>"><?= $row_role['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- Username -->
                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="name" id="username" placeholder="Enter your name" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <i class="fas fa-phone-alt"></i>
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone number" required>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <i class="fas fa-lock"></i>
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" name="register_btn" class="btn btn-primary">Create Account</button>
                </form>

                <p class="text-center mt-3">
                    
                </p>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>   </p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
