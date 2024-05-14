<?php
/**
 * adding owner info in database and getting owner_id
 *
 * @return integer
 */
function saveOwner(mysqli $connection): int {
    global $name_owner, $phone_number, $Email, $residence, $adress, $home_number, $postcode;
    $ownerinfo = [$name_owner, $phone_number, $Email, $residence, $adress, $home_number, $postcode];

    $statement = mysqli_prepare($connection, "INSERT INTO `customers`
                                            (`name_owner`, `phone_number`, `E-mail`, `residence`,
                                            `adress`, `house_number`, `Postcode`)
                                            VALUES (?, ?, ?, ?, ?, ?, ?)");

    mysqli_stmt_execute($statement, $ownerinfo);

    return mysqli_insert_id($connection);
}

/**
 * take owner id
 *
 * @return integer
 */
function getownerid(mysqli $connection): int {
    $ownerId = saveOwner($connection);

    if ($ownerId !== false) {
        echo "New owner added";
        return $ownerId;
    } else {
        echo "Error: " . mysqli_error($connection);
        return 0;
    }
}
