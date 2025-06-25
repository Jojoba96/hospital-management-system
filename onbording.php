<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Care Portal</title>
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

        /* Main Content */
        .main-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 100px 50px;
            color: #f8fafc;
        }

        .main-content .text {
            max-width: 50%;
        }

        .main-content h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .main-content p {
            font-size: 1.2rem;
            line-height: 1.8;
        }

        .main-content img {
            max-width: 40%;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Services Section */
        .services {
            padding: 50px 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            margin: 20px auto;
            max-width: 1200px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .services h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #1e293b;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .services .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-align: center;
            padding: 20px;
            background-color: #fff;
        }

        .services .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .services .card img {
            width: 60px;
            height: 60px;
            margin-bottom: 15px;
        }

        .services .card h3 {
            font-size: 1.5rem;
            color: #030512;
            margin-bottom: 10px;
        }

        .services .card p {
            font-size: 1rem;
            color: #555;
        }

        /* Footer Section */
        footer {
            text-align: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            color: #f8fafc;
            font-size: 0.9rem;
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
            .main-content {
                flex-direction: column;
                text-align: center;
            }

            .main-content img {
                max-width: 80%;
                margin-bottom: 20px;
            }

            .services {
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
            <a href="about.php" class="nav-link">About Us</a>
            <a href="contact.php" class="nav-link">Contact Us</a>
            <a href="department.php" class="nav-link">Departments</a>
            <a href="login.php" class="nav-link">Login</a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content" style="display: flex; justify-content: center; align-items: center; height: 100vh; text-align: center;">
      <div class="text">
          <h1>Welcome to Health Care Portal</h1>
          <p>
              Manage your health effortlessly with our platform. Schedule appointments, track your health, and stay connected with healthcare professionals.
          </p>
      </div>
  </div>  
    <!-- Services Section -->
    <section class="services">
        <h2>Our Services</h2>
        <div class="container">
            <div class="row">
                <!-- Neurology -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                      
                        <h3>Neurology</h3>
                        <p>Specialized care for neurological disorders and conditions.</p>
                    </div>
                </div>
                <!-- Orthopedics -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                    
                        <h3>Orthopedics</h3>
                        <p>Comprehensive treatment for bone and joint health.</p>
                    </div>
                </div>
                <!-- Cardiology -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                      
                        <h3>Cardiology</h3>
                        <p>Advanced heart care services for your cardiovascular health.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        © 2025 Health Care Portal. All rights reserved. |
    </footer>
</body>
</html>
