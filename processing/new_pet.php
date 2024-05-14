<?php
/**
 * insert pet info and get pet id
 *
 * @return integer
 */
function savePet(mysqli $connection, int $ownerId): int {
    global $type_pet, $name_pet;
    $pettinfo = [$type_pet, $name_pet, $ownerId];

    $statement2 = mysqli_prepare($connection, "INSERT INTO `huisdier`
                                            (`type`, `name_pet`, `owner_id`)
                                            VALUES (?, ?, ?)");
                            
    mysqli_stmt_execute($statement2, $pettinfo);

    return mysqli_insert_id($connection);
    }

/**
 * take pet id
 *
 * @return integer
 */
function getpetid(mysqli $connection, int $ownerId): int {
    $pet_id = savePet($connection, $ownerId);
    
    if ($pet_id !== false) {
        echo "New pet added";
        return $pet_id;
    } else {
        echo "Error: " . mysqli_error($connection);
        return 0;
    }
}
