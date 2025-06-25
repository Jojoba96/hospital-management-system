


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
            background-color: #2c3e50; /* gray sidebar */
            color: #fff;
            padding-top: 20px;
            z-index: 100;
            border-right: 3px solid #007bff;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 15px 20px;
            transition: 0.3s;
        }

        

        .sidebar img {
            border-radius: 8px;
            border: 4px solid #007bff;
            margin: 10px auto;
            display: block;
            max-width: 80%;
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

        /* Navbar customizations */
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

        /* Additional styles for the content images */
        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            border: 4px solid #007bff;
            margin-top: 20px;
        }
    </style>





<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center">Patient Portal</h4>
    <img src="../assets/image1.png" alt="Patient Avatar" class="img-fluid mb-3">
    <a href="patientindex.php" class="active">Home</a>
    <a href="bookAppointment.php">Book Appointment</a>
    <a href="viewAppointments.php">View Appointments</a>
    <a href="cancelAppointments.php">Cancel Appointments</a>
    <a href="updateProfile.php">Update Profile</a>
    <a href="logout.php">Logout</a>
</div>