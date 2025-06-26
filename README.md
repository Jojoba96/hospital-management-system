# Hospital Management System

<<<<<<< HEAD
A modern, user-friendly web application for managing hospital operations, built with PHP and MySQL. This system streamlines workflows for administrators, doctors, nurses, and patients, ensuring efficient healthcare management.

---

## 🚀 Features

### 🛡️ Admin Panel
- Full user management (patients, doctors, nurses)
- Create, view, and update patient profiles
- Oversee all appointments and medical histories
- Secure login and role-based access

### 👨‍⚕️ Doctor Panel
- View assigned patients and their medical histories
- Add new diagnoses, treatments, and notes
- Manage appointments and daily tasks
- Access patient information quickly and securely

### 👩‍⚕️ Nurse Panel
- View and manage patient lists
- Schedule and track nursing tasks
- Collaborate with doctors for patient care

### 🧑‍💻 Patient Panel
- Book, view, and cancel appointments
- Update personal profile and contact info
- View medical history and doctor notes

---

## 📁 Folder Structure

- `admin/` — Admin dashboard & management
- `doctor/` — Doctor dashboard & features
- `nurse/` — Nurse dashboard & features
- `patient/` — Patient dashboard & features
- `assets/` — Images and static files
- `conn.php` — Database connection
- `login.php`, `register.php` — Authentication
- `hospital.sql` — Database schema

---

## 🛠️ Setup Instructions

1. **Clone or Download the Repository**
2. **Database Setup:**
   - Import `hospital.sql` into your MySQL server.
   - Update `conn.php` with your database credentials.
3. **Run with XAMPP or any PHP server:**
   - Place the project folder in your web server directory (e.g., `htdocs` for XAMPP).
   - Start Apache and MySQL from XAMPP control panel.
   - Access the app via [http://localhost/hospital/](http://localhost/hospital/) in your browser.

---

## 💻 Requirements
- PHP 7.x or higher
- MySQL
- XAMPP/WAMP/LAMP or any compatible web server

---

## 📸 Screenshots
![Admin Dashboard](assets/image1.png)
![Doctor Panel](assets/image2.png)
![Patient Booking](assets/image3.png)

---

## 🤝 Contributing
Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.

---

## 📄 License
This project is for educational purposes only.
=======
A simple Hospital Management System built with PHP and MySQL, designed to handle basic patient, doctor, and appointment records through a web interface.

## 🏥 Features

- Admin login system
- Manage doctors, patients, and appointments
- Dashboard for tracking hospital operations
- Add/Edit/Delete records
- Basic user interface using HTML/CSS

## 📂 Project Structure

hospital-management-system/
├── admin/ # Admin dashboard & controls
├── assets/ # CSS, JS, images
├── config/ # Database connection
├── includes/ # Reusable PHP components (header, footer)
├── doctor/ # Doctor-side interface
├── patient/ # Patient-side interface
├── index.php # Landing page
└── login.php # Login screen

## 🛠️ Technologies Used

- PHP
- XAMPP 
- MySQL
- HTML/CSS/JavaScript

## 🚀 How to Run Locally

1. **Clone the repository:**

   ```bash
   git clone https://github.com/Jojoba96/hospital-management-system.git
Import the database:

Open phpMyAdmin

Create a new database (e.g. hospital)

Import the hospital.sql (Db must have the same name as project ... to work)

Configure database:

Open /config/db.php and set your MySQL credentials

Run the project:

Open the project folder in your local server (e.g. XAMPP/htdocs)

Visit http://localhost/hospital/login.php in your browser

## 🔐 Default Login

Role	Username	Password
Admin	admin	00000000

## 🤝 Contributing
Contributions are welcome! Fork the repo and create a pull request.

## 📄 License
This project is licensed under the MIT License.

## 👨‍💻 Author
Jojoba96


---



>>>>>>> afacb8710fd21c3176b02f78e45b1d03d5e9f290
