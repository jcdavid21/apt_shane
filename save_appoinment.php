<?php

include 'connection.php';

// Delete expired appointments
$sql = "DELETE FROM appointments WHERE appointment_date < CURDATE() OR (appointment_date = CURDATE() AND end_time < CURTIME())";

if(mysqli_query($conn, $sql)){
    echo "Expired appointments removed successfully.";
} else {
    echo "Error removing expired appointments: " . mysqli_error($conn);
}

// Check if form fields are set
if(isset($_POST['name']) && isset($_POST['student_number']) && isset($_POST['portal']) && isset($_POST['appointment_date']) && isset($_POST['start_time']) && isset($_POST['end_time']) && isset($_POST['Desc'])) {
    
    // Sanitize and escape form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $student_number = mysqli_real_escape_string($conn, $_POST['student_number']);
    $prof_id = mysqli_real_escape_string($conn, $_POST['portal']);
    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
    $start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
    $end_time = mysqli_real_escape_string($conn, $_POST['end_time']);
    $description = mysqli_real_escape_string($conn, $_POST['Desc']);
    $user_id = $_SESSION['user_id'];

    // Get professor name from users table
    $query = "SELECT professor_name FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $prof_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    $prof_name = $data["professor_name"];

    // Insert appointment into appointments table
    $sql = "INSERT INTO appointments (name, student_number, professor_name, appointment_date, start_time, end_time, mess, user_id, prof_id) VALUES ('$name', $student_number, '$prof_name', '$appointment_date', '$start_time', '$end_time', '$description', $user_id, $prof_id)";

    if(mysqli_query($conn, $sql)){
        echo '<script>alert("Appointment Saved!"); window.location.href="./my_appointment.php";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "All fields are required.";
}

mysqli_close($conn);
?>
