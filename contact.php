


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
            z-index: 1;
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

        .top-bar .btn {
            background-color: #38bdf8;
            color: #fff;
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: bold;
            border: none;
            font-size: 0.9rem;
            transition: all 0.3s ease, transform 0.2s ease;
        }

        .top-bar .btn:hover {
            background-color: #0284c7;
            transform: translateY(-2px);
        }

        /* Contact Section */
        .contact-section {
            padding: 50px 20px;
            max-width: 800px;
            margin: 40px auto;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            position: relative;
        }

        .contact-section h1 {
            color: #1e293b;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .contact-section p {
            font-size: 1.2rem;
            color: #4b5563;
            margin-bottom: 15px;
            line-height: 1.8;
        }

        .contact-section p a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .contact-section p a:hover {
            color: #0056b3;
        }

        /* About Our System Section */
        .about-section {
            padding: 80px 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 10px;
            margin: 40px auto;
            max-width: 800px;
        }

        .about-card h2 {
            font-size: 2rem;
            color: #1e293b;
            margin-bottom: 20px;
        }

        .about-card p {
            font-size: 1.1rem;
            color: #4b5563;
            line-height: 1.8;
            margin-bottom: 10px;
        }

        /* Google Map Section */
        .map-section {
            padding: 60px 20px;
            text-align: center;
        }

        .map-section h2 {
            font-size: 2rem;
            color: #f8fafc;
            margin-bottom: 20px;
        }

        .map-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .map-container iframe {
            width: 100%;
            height: 400px;
            border: 0;
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
            .contact-section {
                padding: 30px 15px;
            }

            .map-container iframe {
                height: 300px;
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
            <a href="department.php" class="nav-link">Department</a>
            <a href="contact.php" class="nav-link active">Contact Us</a>
            <a href="login.php" class="nav-link">Login</a>
        </div>
    </header>

    <!-- Contact Section -->
    <div class="contact-section">
        <h1><i class="fas fa-envelope"></i> Contact Us</h1>
        <p>Email: <a href="mailto:support@healthcareportal.com">support@healthcareportal.com</a></p>
        <p><i class="fas fa-phone-alt"></i> Phone: +966 503 431 235</p>
    </div>

    <!-- About Our System Section -->
    <div class="about-section">
        <div class="about-card">
            <h2><i class="fas fa-hospital"></i> About Our System</h2>
            <p>Thank you for your interest in our Hospital Management System (HMS)! We’re here to help you streamline your healthcare operations and enhance patient care.</p>
            <p>Our innovative platform is designed to support hospitals and clinics of all sizes, providing solutions for patient management, appointment scheduling, billing, and more.</p>
            <p>Your feedback and inquiries are important to us. Whether you have questions about our system, need assistance, or want to explore partnership opportunities, please don't hesitate to reach out.</p>
            <p>Get in touch with us today, and let's work together to create a more efficient healthcare system!</p>
        </div>
    </div>

    <!-- Google Map Section -->
    <div class="map-section">
        <h2><i class="fas fa-map-marker-alt"></i> Our Location</h2>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.5087498473687!2d46.67529587522092!3d24.713551284089735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03c0b6cfc3db%3A0x81f614682f6d92da!2sRiyadh%2C%20Saudi%20Arabia!5e0!3m2!1sen!2s!4v1690305045194!5m2!1sen!2s" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        © 2025 Health Care Portal. All rights reserved.
    </footer>
</body>
</html>
