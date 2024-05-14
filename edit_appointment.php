<?php

include 'connection.php';

if(isset($_POST['submit'])){
    // Get form data
    $appointment_id = $_POST['appointment_id'];
    $name = $_POST['name'];
    $student_number = $_POST['student_number'];
    $professor_name = $_POST['professor_name'];
    $appointment_date = $_POST['appointment_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $user_id = $_SESSION["user_id"];
    
    // Update appointment in the database
    $stmt = $conn->prepare("UPDATE appointments SET name=?, student_number=?, professor_name=?, appointment_date=?, start_time=?, end_time=? WHERE user_id = ?");
    $stmt->bind_param("ssssssi", $name, $student_number, $professor_name, $appointment_date, $start_time, $end_time, $user_id);
    
    if ($stmt->execute()) {
        echo '<script>alert("Appointment updated successfully"); window.location.href="./my_appointment.php";</script>';
    } else {
        echo '<script>alert("Failed to update appointment"); window.location.href="./my_appointment.php";</script>';
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
