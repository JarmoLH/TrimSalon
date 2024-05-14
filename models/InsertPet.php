<?php

require_once "Database.php";

/**
 * insert pet into database
 */
class InsertPet
{
    public function savePet($type_pet, $name_pet, $ownerId)
    {
        $petinfo = [
            $type_pet,
            $name_pet,
            $ownerId
        ];

        $query = "INSERT INTO `huisdier`(`type`, `name_pet`, `owner_id`)VALUES (?, ?, ?)";

        $stmt = ConnectDb::getInstance()->getConnection()->prepare($query);
        $stmt->execute($petinfo);

        return ConnectDb::getInstance()->getConnection()->lastInsertId();
    }
}

$newPet = new InsertPet();

// take session data
$type_pet = $_SESSION['form_data']['type_pet'];
$name_pet = $_SESSION['form_data']['name_pet'];
$ownerId = $_SESSION['owner_id'];

//save pet ID
$petId = $newPet->savePet($type_pet, $name_pet, $ownerId);

//put pet ID in session
if ($ownerId) {
    $_SESSION['pet_id'] = $petId;
    echo "Pet saved successfully";
} else {
    $_SESSION["Appointment_failed"] = "Er is iets misgegaan, probeer het opnieuw alstublieft.";
        header("location: Appointment.php");
}
