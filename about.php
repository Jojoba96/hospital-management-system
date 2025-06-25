<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('bgg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            position: relative;
        }

        /* Overlay for readability */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }

        /* Top Navigation Bar */
        .top-bar {
            background-color: #1e293b;
            padding: 15px 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: background-color 0.3s ease-in-out;
        }

        .top-bar:hover {
            background-color: #243447;
        }

        .top-bar .nav-links {
            display: flex;
            gap: 20px;
        }

        .top-bar .nav-link {
            color: #f8fafc;
            font-weight: bold;
            text-decoration: none;
            font-size: 1rem;
            position: relative;
            transition: color 0.3s ease-in-out;
        }

        .top-bar .nav-link:hover,
        .top-bar .nav-link.active {
            color: #38bdf8;
        }

        .top-bar .nav-link::after {
            content: '';
            display: block;
            width: 0;
            height: 2px;
            background: #38bdf8;
            transition: width 0.3s;
            position: absolute;
            bottom: -5px;
            left: 0;
        }

        .top-bar .nav-link:hover::after,
        .top-bar .nav-link.active::after {
            width: 100%;
        }

        /* About Section */
        .about-section {
            padding: 80px 20px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-width: 800px;
            margin: 40px auto;
        }

        .about-section h1 {
            color: #1e293b;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .about-section p {
            font-size: 1.2rem;
            color: #4b5563;
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .about-section p a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .about-section p a:hover {
            color: #0056b3;
        }

        /* Footer Section */
        footer {
            text-align: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            color: #f8fafc;
            font-size: 0.9rem;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.1);
        }

        footer a {
            color: #38bdf8;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        footer a:hover {
            color: #0284c7;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .about-section {
                padding: 30px 15px;
            }

            footer {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Top Navigation Bar -->
    <header class="top-bar">
        <div class="nav-links">
            <a href="index.php" class="nav-link">Home</a>
            <a href="about.php" class="nav-link active">About Us</a>
            <a href="department.php" class="nav-link">Department</a>
            <a href="contact.php" class="nav-link">Contact Us</a>
            <a href="login.php" class="nav-link">Login</a>
        </div>
    </header>

    <!-- About Section -->
    <div class="about-section">
        <h1><i class="fas fa-hospital"></i> About Us</h1>
        <p>Welcome to our Hospital Management System (HMS), where we are dedicated to transforming healthcare delivery through innovative technology. Our system is designed to streamline hospital operations, enhance patient care, and improve overall efficiency.</p>
        <p>At the core of our mission is the commitment to providing healthcare professionals with the tools they need to deliver exceptional service. Our comprehensive platform integrates various functions, including patient registration, appointment scheduling, billing, and electronic health records, ensuring seamless communication and coordination among staff.</p>
        <p>We understand the challenges faced by healthcare institutions today, and our HMS addresses these with user-friendly interfaces and robust features. Whether you're a small clinic or a large hospital, our solution is scalable and customizable to meet your unique needs.</p>
    </div>

    <!-- Footer Section -->
    <footer>
        © 2025 Health Care Portal. All rights reserved. 
    </footer>
</body>
</html>
