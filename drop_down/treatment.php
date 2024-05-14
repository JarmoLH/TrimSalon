<?php
/**
 * show treatment dropdown
 *
 * @return void
 */
function showtreatement(): void {
$connection = mysqli_connect('localhost', 'root', '', 'trim_salon');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$statement = mysqli_prepare($connection, "SELECT * FROM `treatment`");

mysqli_stmt_execute($statement);

$result = mysqli_stmt_get_result($statement);

echo  '<label for="type_treatment">soort behandeling:</label><br>
        <select name="type_treatment" id="type_treatment">';
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row["treatment"] . '">' . $row["treatment"] . '</option>';
}
}
echo '</select><br>';
}

showtreatement();
