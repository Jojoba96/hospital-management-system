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

foreach ($query_user as $row_user) {
    $name = $row_user['name'];
    $phone = $row_user['phone'];
    $email = $row_user['email'];
    $password = $row_user['password'];
}

if (isset($_POST['save_btn'])) {
    $name_ = $_POST['name'];
    $phone_ = $_POST['phone'];
    $email_ = $_POST['email'];
    $password_ = $_POST['password'];
    $sql_update = "UPDATE users SET name='$name_', email='$email_', password='$password_', phone='$phone_' WHERE id = $id";
    if ($query_update = mysqli_query($conn, $sql_update)) {
        header("refresh:0");
    } else {
        echo "Sorry, account update failed.";
    }
}




// Get doctor count
$sql_doctor_count = "SELECT COUNT(*) as count FROM users WHERE role_id = 2";
$query_doctor_count = mysqli_query($conn, $sql_doctor_count);
$doctor_count = mysqli_fetch_assoc($query_doctor_count)['count'];

// Get patient count
$sql_patient_count = "SELECT COUNT(*) as count FROM users WHERE role_id = 3";
$query_patient_count = mysqli_query($conn, $sql_patient_count);
$patient_count = mysqli_fetch_assoc($query_patient_count)['count'];

// Get current date
$current_date = date('Y-m-d');

// Get new bookings count
$sql_new_bookings_count = "SELECT COUNT(*) as count FROM appointments WHERE date >= '$current_date'";
$query_new_bookings_count = mysqli_query($conn, $sql_new_bookings_count);
$new_bookings_count = mysqli_fetch_assoc($query_new_bookings_count)['count'];

// Get today's sessions count
$sql_today_sessions_count = "SELECT COUNT(*) as count FROM appointments WHERE date = '$current_date'";
$query_today_sessions_count = mysqli_query($conn, $sql_today_sessions_count);
$today_sessions_count = mysqli_fetch_assoc($query_today_sessions_count)['count'];


// Get current date and date for one week from now
$current_date = date('Y-m-d');
$next_week_date = date('Y-m-d', strtotime('+1 week'));

// Get upcoming sessions
$sql_upcoming_sessions = "SELECT * FROM appointments WHERE date >= '$current_date' AND date <= '$next_week_date' ORDER BY date, time";
$query_upcoming_sessions = mysqli_query($conn, $sql_upcoming_sessions);






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Dashboard</title>
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
            background-color: rgb(81, 112, 145);
            color: #fff;
            border-radius: 5px;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .dashboard-header {
            background-color: rgb(81, 112, 145);
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .stats-container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
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
            color: rgb(81, 112, 145);
        }

        .stat-card p {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
        }

        .upcoming-sessions {
            margin-top: 40px;
        }

        table {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table thead {
            background-color: #007bff;
            color: white;
        }

        table td, table th {
            padding: 15px;
            text-align: center;
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
    <div class="dashboard-header">
        <h2>Welcome, Dr. <?php echo $name; ?></h2>
        <p>Manage your account and appointments efficiently!</p>
        <img src="../assets/image2.png" alt="Welcome Image" class="img-fluid mb-3" style="width: 90%; max-height: 300px; object-fit: cover;">
        <!-- <button type="button" class="btn btn-light" data-toggle="modal" data-target="#appointmentsModal" onclick="fetchAppointments()">View My Appointments</button> -->
        
    </div>


    <!-- Appointments Modal -->
<!--<div class="modal fade" id="appointmentsModal" tabindex="-1" aria-labelledby="appointmentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="appointmentsModalLabel">My Appointments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="appointmentsForm">
                    <div class="form-group">
                        <label for="patientName">Patient Name</label>
                        <input type="text" class="form-control" id="patientName" readonly>
                    </div>
                    <div class="form-group">
                        <label for="scheduledDate">Scheduled Date</label>
                        <input type="date" class="form-control" id="scheduledDate" readonly>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" readonly>
                    </div>
                    <button type="button" class="btn btn-primary" id="nextAppointmentButton">Next Appointment</button>
                </form>
            </div>
        </div>
    </div>
</div> -->




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
let appointments = []; // Array to hold appointments
let currentAppointmentIndex = 0; // Index to track the current appointment

function fetchAppointments() {
    $.ajax({
        url: 'fetch_appointments.php', // This PHP file fetches appointments
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            appointments = data; // Store appointments in the global array
            currentAppointmentIndex = 0; // Reset index
            if (appointments.length > 0) {
                populateForm(currentAppointmentIndex); // Populate form with the first appointment
            } else {
                alert("No appointments scheduled.");
            }
        },
        error: function() {
            alert('Error fetching appointments.');
        }
    });
}

function populateForm(index) {
    if (appointments.length > 0 && index < appointments.length) {
        $('#patientName').val(appointments[index].patient_name);
        $('#scheduledDate').val(appointments[index].date);
        $('#time').val(appointments[index].time);
    }
}

// Handle Next Appointment button click
$('#nextAppointmentButton').on('click', function() {
    if (currentAppointmentIndex < appointments.length - 1) {
        currentAppointmentIndex++;
        populateForm(currentAppointmentIndex);
    } else {
        alert("No more appointments.");
    }
});
</script>

    <div class="stats-container">
        <div class="stat-card">
            <h4>All Doctors</h4>
            <p><?php echo $doctor_count; ?></p>
        </div>
        <div class="stat-card">
            <h4>All Patients</h4>
            <p><?php echo $patient_count; ?></p>
        </div>
        <div class="stat-card">
            <h4>New Bookings</h4>
            <p><?php echo $new_bookings_count; ?></p>
        </div>
        <div class="stat-card">
            <h4>Today's Sessions</h4>
            <p><?php echo $today_sessions_count; ?></p>
        </div>
    </div>

    <div class="upcoming-sessions">
        <h3>Upcoming Sessions</h3>
        <img src="../assets/image3.png" alt="Sessions Image" class="img-fluid mb-4" style="width: 100%; height: 250px; object-fit: cover; border-radius: 12px; border: 4px solid #007bff;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Session Title</th>
                    <th>Scheduled Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>

            <?php
        // Check if there are any upcoming sessions
        if (mysqli_num_rows($query_upcoming_sessions) > 0) {
            while ($row = mysqli_fetch_assoc($query_upcoming_sessions)) {
                $session_title = "Appointment with Doctor ID: " . $row['doctor_id']; // Customize this title as needed
                $scheduled_date = $row['date'];
                $time = $row['time'];
                echo "<tr>
                        <td>$session_title</td>
                        <td>$scheduled_date</td>
                        <td>$time</td>
                      </tr>";
            }
        } else {
            echo "<tr>
                    <td>No sessions scheduled for the next week</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>";
        }
        ?>
        
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
