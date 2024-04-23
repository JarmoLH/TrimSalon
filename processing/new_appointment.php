<?php

$appointmentinfo = [$type_treatment, $date, $time, $pet_id];

$statement3 = mysqli_prepare($connection, "INSERT INTO `appointments`
                                           (`treatment`, `date`, `time`, `pet_id`)
                                            VALUES (?, ?, ?, ?)");

mysqli_stmt_execute($statement3, $appointmentinfo);

if (mysqli_stmt_affected_rows($statement3) > 0) {
    $_SESSION["Appointment_created"] = "Uw afspraak is ingepland!";
    header("location: Appointment.php");
} else {
   echo "Error: " . mysqli_error($connection);
}
