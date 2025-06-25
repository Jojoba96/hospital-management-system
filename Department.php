<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
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

        /* Department Section */
        .department-section {
            padding: 80px 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-width: 1000px;
            margin: 40px auto;
            text-align: center;
        }

        .department-section h1 {
            color: #1e293b;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

        .department-card {
            background: white;
            border-radius: 15px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .department-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .department-card h2 {
            font-size: 1.8rem;
            color: #1e293b;
            margin-bottom: 15px;
        }

        .department-card p {
            font-size: 1.2rem;
            color: #4b5563;
            line-height: 1.8;
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
            .department-section {
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
            <a href="about.php" class="nav-link">About Us</a>
            <a href="department.php" class="nav-link active">Departments</a>
            <a href="contact.php" class="nav-link">Contact Us</a>
            <a href="login.php" class="nav-link">Login</a>
        </div>
    </header>

    <!-- Department Section -->
    <div class="department-section">
        <h1><i class="fas fa-clinic-medical"></i> Explore Our Departments</h1>

        <div class="department-card">
            <h2><i class="fas fa-x-ray"></i> Radiology</h2>
            <p>Radiology is a vital medical specialty utilizing advanced imaging techniques such as X-rays, CT scans, and MRIs to diagnose and treat various conditions.</p>
        </div>

        <div class="department-card">
            <h2><i class="fas fa-scalpel"></i> General Surgery</h2>
            <p>General surgery specializes in a wide range of procedures, including those involving the abdomen, skin, and soft tissues, essential for managing acute and complex cases.</p>
        </div>

        <div class="department-card">
            <h2><i class="fas fa-brain"></i> Neurology</h2>
            <p>Neurology focuses on diagnosing and treating disorders of the nervous system, including the brain, spinal cord, and peripheral nerves.</p>
        </div>

        <div class="department-card">
            <h2><i class="fas fa-baby"></i> Pediatrics</h2>
            <p>Pediatrics ensures the health and development of infants, children, and adolescents, addressing their unique medical needs with a focus on preventive care.</p>
        </div>

        <div class="department-card">
            <h2><i class="fas fa-bone"></i> Orthopedics</h2>
            <p>Orthopedics specializes in diagnosing, treating, and preventing disorders of the musculoskeletal system, focusing on bones, joints, ligaments, tendons, and muscles.</p>
        </div>

        <div class="department-card">
            <h2><i class="fas fa-user-md"></i> Family Medicine</h2>
            <p>Family medicine provides comprehensive primary care for individuals and families of all ages, focusing on preventive care and the management of chronic and acute conditions.</p>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        © 2025 Health Care Portal. All rights reserved. | <a href="privacy.html">Privacy Policy</a>
    </footer>
</body>
</html>
