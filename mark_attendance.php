<?php
session_start();
include "db.php";

// Check login
if (!isset($_SESSION['student_id'])) {
    die("Please login first!");
}

$student_id = $_SESSION['student_id'];

// Get QR data
$data = $_GET['data'];

// Current date & time
$date = date("Y-m-d");
$time = date("H:i:s");

// ✅ Validate QR (important)
if ($data != "attendance_" . $date) {
    die("Invalid QR Code!");
}

// ✅ Check duplicate for SAME student
$check = mysqli_query($conn, "SELECT * FROM attendance 
WHERE student_id='$student_id' AND date='$date'");

if (mysqli_num_rows($check) > 0) {
    echo "Already Marked!";
} else {
    mysqli_query($conn, "INSERT INTO attendance (student_id, date, time, status) 
    VALUES ('$student_id', '$date', '$time', 'Present')");
    
    echo "Attendance Marked!";
}

$parts = explode("_", $data);

if (count($parts) != 3) {
    die("Invalid QR!");
}

$qr_date = $parts[1];
$qr_time = $parts[2];

// Check expiry (2 minutes)
if (time() - $qr_time > 120) {
    die("QR Expired!");
}
?>