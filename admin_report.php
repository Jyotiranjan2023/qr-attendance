<?php
session_start();
include "db.php";

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Filter by date
$date_filter = "";
if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $date_filter = "WHERE attendance.date = '$date'";
}

$query = "SELECT attendance.*, students.name 
FROM attendance 
JOIN students ON attendance.student_id = students.id 
$date_filter
ORDER BY attendance.date DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container" style="width:600px;">

<h2>Attendance Report</h2>

<!-- Filter -->
<form method="get">
    <input type="date" name="date">
    <button>Filter</button>
</form>

<br>

<table border="1" width="100%" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['time']; ?></td>
        <td><?php echo $row['status']; ?></td>
    </tr>
    <?php } ?>

</table>

<br>
<a href="export.php"><button>Export Excel</button></a>
<a href="admin_dashboard.php"><button>Back</button></a>

</div>

</body>
</html>