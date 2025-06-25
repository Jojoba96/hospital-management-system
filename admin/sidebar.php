<style>
        body {
            direction: ltr;
            text-align: left;
            background-color: #edf3fa;
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
            border-right: 3px solid #007bff;
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
    </style>




<div class="sidebar">
        <h4 class="text-center">Admin Dashboard</h4>
        <img src="../assets/image1.png" alt="Admin Image">
        
        <!-- <a href="../register.php"  >Create Accounts</a> -->
        <a href="adminindex.php">Dashboard</a>
        <a href="../register.php">Register Users</a>
        <a href="manageUsers.php">Manage Users</a>
        <a href="viewPatientProfiles.php" class="active">View Patient Profiles</a>
        <a href="viewMedicalHistory.php">View Specializations</a>
        <a href="viewAppointments.php">View Appointments</a>
        <a href="logout.php">Logout</a>
    </div>
