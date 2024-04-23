<?php

$connection = mysqli_connect("localhost", "root", "", "trim_salon");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$username = "AdminUser";
$password = "AdminPass";
$HashedPassword = password_hash($password, PASSWORD_DEFAULT);

$statement = mysqli_prepare($connection, "INSERT INTO `admin` (`username`, `password`) VALUES (?, ?)");

mysqli_stmt_execute($statement, [$username, $HashedPassword]);

if (mysqli_stmt_affected_rows($statement) > 0) {
    echo "New account added";
} else {
    echo "Error: " . mysqli_error($connection);
}
