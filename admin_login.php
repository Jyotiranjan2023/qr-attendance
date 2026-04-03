<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND password='$password'");

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $email;
        header("Location: admin_dashboard.php");
    } else {
        echo "Invalid Admin Login!";
    }
}
?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="container">
<h2>Admin Login</h2>

<form method="post">
    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button name="login">Login</button>
</form>
</div>