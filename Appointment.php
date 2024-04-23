<?php
session_start();

if (isset($_SESSION["Appointment_created"])) {
    echo '<script>alert("' . $_SESSION["Appointment_created"] . '");</script>';
    unset($_SESSION["Appointment_created"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trim Salon Appointment</title>
</head>
    <H1>Trim Salon Appointment</H1>
<body>

<a href="LogIn.php">Log in</a><br><br>

    <form action="Processing.php" method="post">

    <?php
    include_once "drop_down/species.php";
    include_once "drop_down/treatment.php";
    include_once "html/appointment.php";
    include_once "html/pet.php";
    include_once 'html/owner.php';
    ?>

    <input type="submit" name="submit" value="Send">
    </form>
    
</body>
</html>
