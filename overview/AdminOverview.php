<?php
$connection = mysqli_connect('localhost', 'root', '', 'trim_salon');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$statement = mysqli_prepare($connection, "SELECT * FROM `customers`
                                        JOIN `huisdier`
                                        ON  `customers`.`ID` = `huisdier`.`owner_id`
                                    JOIN `appointments`
                                    ON  `huisdier`.`id_pet` = `appointments`.`pet_id`"
                                    );

mysqli_stmt_execute($statement);

$result = mysqli_stmt_get_result($statement);

foreach ($result as $row) {
    echo "Naam eigenaar: " . $row['name_owner'] . '<br>';
    echo "E-mail: " . $row['E-mail'] . '<br>';
    echo "Telefoonnummer: " . $row['phone_number'] . '<br>';
    echo "Woonplaats: " . $row['residence'] . '<br>';
    echo "Straat: " . $row['adress' ] . " " . $row['house_number'] . '<br>';
    echo "Postcode: " . $row['postcode'] . '<br>';
    echo "Naam huisdier: " . $row['name_pet'] . '<br>';
    echo "Huisdier soort: " . $row['type'] . '<br>';
    echo "Huisdier treatment: " . $row['treatment'] . '<br>';
    echo "Datum: " . $row['date'] . '<br>';
    echo "tijd: " . $row['time'] . '<br><br>';
}
