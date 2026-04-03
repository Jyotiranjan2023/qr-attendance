<?php
include "db.php";

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=attendance.xls");

echo "Name\tDate\tTime\tStatus\n";

$query = "SELECT attendance.*, students.name 
FROM attendance 
JOIN students ON attendance.student_id = students.id";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['name'] . "\t" . $row['date'] . "\t" . $row['time'] . "\t" . $row['status'] . "\n";
}
?>