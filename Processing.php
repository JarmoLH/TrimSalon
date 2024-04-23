<?php
session_start();

$connection = mysqli_connect('localhost', 'root', '', 'trim_salon');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

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

    include_once "processing/new_owner.php";
    include_once "processing/new_pet.php";
    include_once "processing/new_appointment.php";
