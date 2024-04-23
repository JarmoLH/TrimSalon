<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
    <H1>Admin log in page</H1>
<body>

<?php
if (isset($_SESSION["login_error"])) {
    echo '<script>alert("' . $_SESSION["login_error"] . '");</script>';
    unset($_SESSION["login_error"]);
}
?>

<form action="LogIn_Backend.php" method="post">

    <label for="username">Username: </label><br>
    <input type="text" id="username" name="username" placeholder="adminUser" required><br>

    <label for="password">Wachtwoord:</label><br>
    <input type="text" id="password" name="password" placeholder="adminPass" required><br>

    <input type="submit" name="submit" value="Send">

</form>

</body>
</html>
