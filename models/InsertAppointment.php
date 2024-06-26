<?php
require_once "Database.php";

class InsertAppointment
{
    /**
     * Save appointment data in database
     *
     * @param [type] $type_treatment
     * @param [type] $date
     * @param [type] $time
     * @param [type] $petId
     * @return boolean
     */
    public function saveAppointment($type_treatment, $date, $time, $petId): bool
    {
        $appointmentinfo = [
            $type_treatment,
            $date,
            $time,
            $petId
        ];

        $query = "INSERT INTO `appointments`
                                (`treatment`, `date`, `time`, `pet_id`)
                                 VALUES (?, ?, ?, ?)";

        $stmt = ConnectDb::getInstance()->getConnection()->prepare($query);

        return $stmt->execute($appointmentinfo);
    }
}

$newAppointment = new InsertAppointment();

//take session data
$type_treatment = $_SESSION['form_data']['type_treatment'];
$date = $_SESSION['form_data']['date'];
$time = $_SESSION['form_data']['time'];
$petId = $_SESSION['pet_id'];

// Save the appointment
if ($newAppointment->saveAppointment($type_treatment, $date, $time, $petId)) {
    $_SESSION["Appointment_created"] = "Uw afspraak is ingepland!";
        header("location: Appointment.php");
} else {
    $_SESSION["Appointment_failed"] = "Er is iets misgegaan, probeer het opnieuw alstublieft.";
        header("location: Appointment.php");
}
