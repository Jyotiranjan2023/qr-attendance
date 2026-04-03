<?php
$date = date("Y-m-d");
$qrData = "attendance_" . $date;

$qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . $qrData;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generate QR</title>
</head>
<body>

<h3>Today's QR Code</h3>

<img src="<?php echo $qrUrl; ?>" alt="QR Code">

<p>Scan this QR to mark attendance</p>

</body>
</html>