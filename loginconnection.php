<?php

include './connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Assuming username is email here
    $password = $_POST['password'];
    $selectedPortal = $_POST['portal']; // Retrieve the selected portal value

    $sql = "SELECT * FROM `users` WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Check if the selected portal matches the role of the user
            if ($selectedPortal == $row['role']) {
                // Login successful

                $_SESSION['username'] = $row['username']; // Set the username in the session
                $_SESSION["user_id"] = $row['user_id'];
                $_SESSION["teachernum"] = $row['teacher_number'];

                // Redirect based on the selected portal
                if ($selectedPortal == 'teacher') {
                    // Redirect to the teacher dashboard or perform teacher-specific actions
                    header('location: ./index1.php');
                    exit();
                } else if ($selectedPortal == 'student') {
                    // Redirect to the student dashboard or perform student-specific actions
                    header('location: ./index.php');
                    exit();
                }
            } else {
                // Selected portal does not match user's role
                echo '<script>alert("Invalid portal selection!"); window.location.href="./login.php";</script>';
            }
        } else {
            // Invalid password
            echo '<script>alert("Login failed! Invalid username or password"); window.location.href="./login.php";</script>';
        }
    } else {
        // User not found
        echo '<script>alert("User not found!"); window.location.href="./login.php";</script>';
    }
}
?>
