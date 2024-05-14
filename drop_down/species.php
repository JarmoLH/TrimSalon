<?php
/**
 * Show animal choice dropdown
 *
 * @return void
 */
function showAnimal(): void {
    $connection = mysqli_connect('localhost', 'root', '', 'trim_salon');

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $statement = mysqli_prepare($connection, "SELECT * FROM `species`");

    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);

    echo  '<label for="type_pet">soort dier:</label><br>
            <select name="type_pet" id="type_pet">';
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row["animal"] . '">' . $row["animal"] . '</option>';
    }
    }
    echo '</select><br>';
}

showAnimal();
