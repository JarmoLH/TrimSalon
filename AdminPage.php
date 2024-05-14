<?php
session_start();

if (isset($_SESSION["login_success"])) {
    echo '<script>alert("' . $_SESSION["login_success"] . '");</script>';
    unset($_SESSION["login_success"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
    <h1>Appointment overview</h1>
<body>

<a href="LogOut.php">Log Out</a><br><br>
   
   <?php
        include_once "models/ShowAppointments";
    ?>
    
</body>
</html>
