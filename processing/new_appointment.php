<?php
/**
 * add appointment info
 *
 * @return mysqli_result|false
 */
function saveAppointment(mysqli $connection, int $pet_id): mysqli_result|false {
    global $type_treatment, $date, $time;

    $appointmentinfo = [$type_treatment, $date, $time, $pet_id];

    $statement3 = mysqli_prepare($connection, "INSERT INTO `appointments`
                                            (`treatment`, `date`, `time`, `pet_id`)
                                                VALUES (?, ?, ?, ?)");

    mysqli_stmt_execute($statement3, $appointmentinfo);

    return mysqli_stmt_get_result($statement3);
}

/**
 * notification completed appointment and header
 *
 * @return void
 */
function finishappointment(mysqli $connection, $petId): void {

    $statement3 = saveAppointment($connection, $petId);
    if ($statement3 == false) {
        $_SESSION["Appointment_created"] = "Uw afspraak is ingepland!";
        header("location: Appointment.php");
    } else {
    echo "Error: " . mysqli_error($connection);
    }
}
