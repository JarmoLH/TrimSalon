<?php
require_once "Database.php";

/**
 * Insert owner into database
 */
class InsertOwner
{
    /**
     * save owner data in database
     *
     * @param [type] $name_owner
     * @param [type] $phone_number
     * @param [type] $email
     * @param [type] $residence
     * @param [type] $adress
     * @param [type] $home_number
     * @param [type] $postcode
     * @return bool
     */
    public function saveOwner($name_owner, $phone_number, $email, $residence, $adress, $home_number, $postcode): bool
    {
        $ownerinfo = [
            $name_owner,
            $phone_number,
            $email,
            $residence,
            $adress,
            $home_number,
            $postcode
        ];

        $query = "INSERT INTO `customers` (`name_owner`, `phone_number`, `E-mail`, `residence`, `adress`, `house_number`, `Postcode`)
                  VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = ConnectDb::getInstance()->getConnection()->prepare($query);
        $stmt->execute($ownerinfo);

        return ConnectDb::getInstance()->getConnection()->lastInsertId();
    }
}

$newOwner = new InsertOwner();

//take session data
$name_owner = $_SESSION['form_data']["name_owner"];
$phone_number = $_SESSION['form_data']["phone_number"];
$email = $_SESSION['form_data']["E-mail"];
$residence = $_SESSION['form_data']["residence"];
$adress = $_SESSION['form_data']["adress"];
$home_number = $_SESSION['form_data']["home_number"];
$postcode = $_SESSION['form_data']["postcode"];

//save owner ID
$ownerId = $newOwner->saveOwner($name_owner, $phone_number, $email, $residence, $adress, $home_number, $postcode);

//put owner ID in session
if ($ownerId) {
    $_SESSION['owner_id'] = $ownerId;
    echo "Owner saved successfully";
} else {
    $_SESSION["Appointment_failed"] = "Er is iets misgegaan, probeer het opnieuw alstublieft.";
        header("location: Appointment.php");
}
