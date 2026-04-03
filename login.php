<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM students WHERE email='$email'");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['student_id'] = $row['id'];
            header("Location: scan.php");
            exit();
        } else {
            $error = "Wrong Password!";
        }
    } else {
        $error = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">

    <h2>Student Login</h2>

    <?php if (isset($error)) { ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php } ?>

    <form method="post">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button name="login">Login</button>
    </form>

</div>

</body>
</html>