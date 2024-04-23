<?php

$pettinfo = [$type_pet, $name_pet, $owner_id];

$statement2 = mysqli_prepare($connection, "INSERT INTO `huisdier`
                                          (`type`, `name_pet`, `owner_id`)
                                           VALUES (?, ?, ?)");
                        
$result2 = mysqli_stmt_execute($statement2, $pettinfo);

if ($result2) {
    $pet_id = mysqli_insert_id($connection);
} else {
   echo "Error: " . mysqli_error($connection);
}
