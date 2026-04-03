<?php
include "db.php";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO students (name, email, password) VALUES ('$name', '$email', '$password')");

    echo "Registered Successfully!";
}
?>

<form method="post">
    <h2>Register</h2>
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    Password: <input type="password" name="password"><br><br>
    <button name="register">Register</button>
</form>