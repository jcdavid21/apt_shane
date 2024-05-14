<?php 
include 'connection.php';

$user_id = 3; // Assuming you want to update the user with user_id = 3

// Select user data
$query = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$data  = $result->fetch_assoc();

if ($data) { // Check if user exists
    // Hash the password
    $hashedPassword = password_hash($data["password"], PASSWORD_DEFAULT);

    // Update the hashed password in the database
    $query = "UPDATE users SET password = ? WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $hashedPassword, $user_id);
    if ($stmt->execute()) {
        echo "Password updated successfully.";
    } else {
        echo "Error updating password: " . $conn->error;
    }
} else {
    echo "User with user_id = $user_id not found.";
}

$stmt->close();
$conn->close();
?>
