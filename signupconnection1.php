<?php
include './connection.php'; // Include database configuration

function isStrongPassword($password) {
    // Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W\_])[A-Za-z\d\W\_]{8,}$/', $password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeat_password'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $cellphone = $_POST['cellphone'];
    $address = $_POST['address'];
    $teachernum = $_POST['teachernum'];

    // Check if any of the required fields are empty
    if (empty($username) || empty($password) || empty($repeatPassword) || empty($lastname) || empty($firstname) || empty($cellphone) || empty($address)) {
        echo "Please fill in all the required fields!";
    } else {
        if ($password !== $repeatPassword) {
            echo '<script>alert("Passwords do not match!"); window.location.href="./signup.php";</script>';
        } else if (!isStrongPassword($password)) {
            echo '<script>alert("Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character!"); window.location.href="./signup.php";</script>';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            // Check if the username already exists
            $checkQuery = "SELECT * FROM users WHERE username = '$username'";
            $result = $conn->query($checkQuery);

            if ($result->num_rows > 0) {
                echo "Username already exists!";
            } else {
                // Insert the new user if the username is not already taken
                $sql = "INSERT INTO users1 (username, password, lastname, firstname, middlename, cellphone, address, `teacher_number`)
                        VALUES ('$username', '$hashedPassword', '$lastname', '$firstname', '$middlename', '$cellphone', '$address', '$teachernum')";

                if ($conn->query($sql) === TRUE) {
                    echo '<script>alert("Registration success!"); window.location.href="./login.php";</script>';
                    // Redirect to a success page or login page
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }
}
?>
