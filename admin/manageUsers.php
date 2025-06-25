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
$sql_roles = "SELECT * FROM roles WHERE id != 1";
$query_roles = mysqli_query($conn, $sql_roles);

$sql_users = "SELECT * FROM users WHERE role_id != 1 ORDER BY users.id DESC";
$query_users = mysqli_query($conn, $sql_users);

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
            echo "<script>alert('✅ Registration Successful!'); window.location.href='adminindex.php';</script>";
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
    <title>Register Staff</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            direction: ltr;
            text-align: left;
            background: #edf3fa;
        }

        /* Sidebar Styling */
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #2c3e50;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            color: #ecf0f1;
        }

        .sidebar img {
            width: 80%;
            margin: 0 auto 20px;
            border-radius: 10px;
            border: 3px solid #007bff;
            display: block;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #ecf0f1;
            display: block;
        }

        .sidebar a:hover {
            background-color: #34495e;
            color: #ecf0f1;
        }

        /* Page Content */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        th,
        td {
            text-align: center;
            background: #edf3fa;
        }

        /* Button styles */
        .btn-edit,
        .btn-delete {
            margin: 2px;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #007bff;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        /* To prevent content from overlapping with the navigation bar */
        .content {
            margin-top: 80px;
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
<div class="content">
    <h3>Manage Users</h3>
    <button class="btn btn-primary mb-3" onclick="showForm()">Add User</button>
    <div class="table-container">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="staffTableBody">
                <?php foreach ($query_users as $row_user) {
                    $user_role_id = $row_user['role_id'];
                    $sql_user_role = "SELECT * FROM roles WHERE id = $user_role_id";
                    $query_user_role = mysqli_query($conn, $sql_user_role);
                    foreach ($query_user_role as $row_user_role) {
                        $role_name = $row_user_role['name'];
                    }
                ?>
                    <tr>
                        <td><?= $row_user['name']; ?></td>
                        <td><?= $row_user['email']; ?></td>
                        <td><?= $row_user['phone']; ?></td>
                        <td><?= $role_name; ?></td>
                        <td>
                            <a style="text-decoration: none;" class="btn-edit" href="viewAccount.php?id=<?= $row_user['id']; ?>">Edit</a>
                            <a style="text-decoration: none;" class="btn-delete" href="staff-delete.php?id=<?= $row_user['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Staff Form -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="dataForm" method="POST" action="manageUsers.php">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" name="role" id="role" required>
                            <?php foreach ($query_roles as $row_role) { ?>
                                <option value="<?= $row_role['id']; ?>"><?= $row_role['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <button type="submit" name="register_btn" class="btn btn-primary">Save</button>
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
