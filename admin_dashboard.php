<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$date = date("Y-m-d");

$timestamp = time(); // current time
$qrData = "attendance_" . $date . "_" . $timestamp;
$qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . $qrData;
?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="container">
<h2>Admin Dashboard</h2>

<p>Today's QR Code</p>

<img src="<?php echo $qrUrl; ?>">

<br><br>
<a href="admin_report.php"><button>View Report</button></a>
<a href="logout.php"><button>Logout</button></a>

</div>