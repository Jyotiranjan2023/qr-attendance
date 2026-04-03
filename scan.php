<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Scan QR</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">

    <h2>Scan QR Code</h2>
    <p>Scan the QR shown by your teacher</p>

    <div id="reader" style="width:250px; margin:auto;"></div>

    <br>

    <a href="logout.php">
        <button>Logout</button>
    </a>

</div>

<script src="https://unpkg.com/html5-qrcode"></script>

<script>
function onScanSuccess(decodedText, decodedResult) {
    alert("Scanned: " + decodedText);
    window.location.href = "mark_attendance.php?data=" + decodedText;
}

let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    {
        fps: 10,
        qrbox: { width: 200, height: 200 }
    }
);

html5QrcodeScanner.render(onScanSuccess);
</script>

</body>
</html>