<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['studentnum'])) {
    header("Location: index.php");
    exit();
}

// Check if appointment_id is provided
if (!isset($_POST['appointment_id'])) {
    // Redirect back to the appointments page or display an error message
    header("Location: appointment.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qmet_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement to delete the appointment
$stmt = $conn->prepare("DELETE FROM appointments WHERE id = ? AND student_number = ?");
$stmt->bind_param("is", $_POST['appointment_id'], $_SESSION['studentnum']);

// Execute the query
$stmt->execute();

// Check if appointment was canceled successfully
if ($stmt->affected_rows > 0) {
    echo '<script>alert("Cancelation success!"); window.location.href="./my_appointment.php";</script>';
} else {
    echo "Failed to cancel appointment. Please try again.";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>