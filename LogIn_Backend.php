<?php
session_start();

$connection = mysqli_connect("localhost", "root", "", "trim_salon");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$inputUsername = $_POST['username'];
$inputPassword = $_POST['password'];

$safeUsername = $connection->real_escape_string($inputUsername);

$statement = mysqli_prepare($connection, "SELECT * FROM `admin` WHERE `username`=(?)");

mysqli_stmt_execute($statement, [$safeUsername]);

$result = mysqli_stmt_get_result($statement);

if ($result) {
    if ($result > 0) {
        $userData = $result->fetch_assoc();
        $hashedPassword = $userData['password'];

        if (password_verify($inputPassword, $hashedPassword)) {
            $_SESSION["login_success"] = "Login successful!";
            header("Location: AdminPage.php");
            exit;
        }
         else {
            $_SESSION["login_error"] = "Invalid username or password";
            header("Location: LogIn.php");
            exit();
        }
    } else {
        $_SESSION["login_error"] = "Invalid username or password";
        header("Location: LogIn.php");
        exit();
    }

    $result->free();
}

$connection->close();
