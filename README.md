# 📱 QR Code Based Attendance System

A smart web-based attendance system that uses **QR codes** to mark student attendance securely and efficiently.

---

## 🚀 Features

* 🔐 Student Registration & Login (with secure password hashing)
* 👨‍🏫 Admin Panel for QR Code generation
* 📷 QR Code scanning using camera
* ⏳ QR Code expiry (prevents misuse)
* 📊 Attendance report dashboard
* 📅 Filter attendance by date
* 📥 Export attendance to Excel
* 🎨 Clean and simple UI

---

## 🧠 How It Works

1. Admin logs in and generates a QR code
2. QR code is valid only for a limited time (e.g., 2 minutes)
3. Student logs in and scans the QR code
4. Attendance is recorded in the database
5. Admin can view and export attendance reports

---

## 🛠️ Tech Stack

* **Frontend:** HTML, CSS, JavaScript
* **Backend:** PHP
* **Database:** MySQL
* **Libraries:** html5-qrcode

---

## 📁 Project Structure

qr-attendance/
│
├── admin_login.php
├── admin_dashboard.php
├── admin_report.php
├── register.php
├── login.php
├── logout.php
├── scan.php
├── mark_attendance.php
├── export.php
├── db.php
│
├── assets/
│   └── css/
│       └── style.css

---

## ⚙️ Installation (Local Setup)

1. Install XAMPP

2. Start Apache & MySQL

3. Move project to:

   ```
   C:\xampp\htdocs\
   ```

4. Open phpMyAdmin:

   ```
   http://localhost/phpmyadmin
   ```

5. Create database:

   ```
   qr_attendance
   ```

6. Run SQL:

```sql
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255)
);

CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    date DATE,
    time TIME,
    status VARCHAR(10)
);

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    password VARCHAR(100)
);

INSERT INTO admin (email, password) VALUES ('admin@gmail.com', 'admin123');
```

---

## 🔧 Configuration

Update your `db.php`:

```php
$conn = mysqli_connect("127.0.0.1", "root", "root", "qr_attendance", 3307);
```

(Change according to your system)

---

## 🌐 Usage

* Admin Login:

  ```
  /admin_login.php
  ```

* Student Register:

  ```
  /register.php
  ```

* Student Login:

  ```
  /login.php
  ```

---

## 🔐 Security Features

* Password hashing using `password_hash()`
* Password verification using `password_verify()`
* QR expiration to prevent fake attendance

---

## 📸 Screenshots (Add Later)

* Admin Dashboard
* QR Code Screen
* Scan Page
* Attendance Report

---

