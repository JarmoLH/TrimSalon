<?php
session_start();

$_SESSION['form_data'] = $_POST;

    include_once "models/InsertOwner.php";
    include_once "models/InsertPet.php";
    include_once "models/InsertAppointment.php";
