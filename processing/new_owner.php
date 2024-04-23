<?php
$ownerinfo = [$name_owner, $phone_number, $Email, $residence, $adress, $home_number, $postcode];

$statement = mysqli_prepare($connection, "INSERT INTO `customers`
                                        (`name_owner`, `phone_number`, `E-mail`, `residence`,
                                         `adress`, `house_number`, `Postcode`)
                                         VALUES (?, ?, ?, ?, ?, ?, ?)");

mysqli_stmt_execute($statement, $ownerinfo);

$result = mysqli_stmt_affected_rows($statement);

if ($result > 0) {
    echo "New record created successfully";
    $owner_id = mysqli_insert_id($connection);
} else {
    echo "Error: " . mysqli_error($connection);
}
