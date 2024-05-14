<?php
session_start();

function connectdb() {
    $connection = mysqli_connect('localhost', 'root', '', 'trim_salon');

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    return $connection;
}

function getpost() {
    global $type_pet, $name_pet, $name_owner, $phone_number,
           $Email, $residence, $adress, $home_number, $postcode, $type_treatment, $date, $time;

    $type_pet = $_POST["type_pet"];
    $name_pet = $_POST["name_pet"];
    $name_owner = $_POST["name_owner"];
    $phone_number = $_POST["phone_number"];
    $Email = $_POST["E-mail"];
    $residence = $_POST["residence"];
    $adress = $_POST["adress"];
    $home_number = $_POST["home_number"];
    $postcode = $_POST["postcode"];
    $type_treatment = $_POST["type_treatment"];
    $date = $_POST["date"];
    $time = $_POST["time"];
}
getpost();

    include_once "processing/new_owner.php";
    include_once "processing/new_pet.php";
    include_once "processing/new_appointment.php";

    $connection = connectdb();

    $ownerId = getownerid($connection);

    $petId = getpetid($connection, $ownerId);

    finishappointment($connection, $petId);
