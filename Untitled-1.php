<?php
include 'connection.php';

// $user_id = $_SESSION['user_id'];

if(isset($_POST['logout'])){
    session_destroy();
    header('location:index.php');
}
?>

<?php 
if (isset($_SESSION['studentnum'])) {
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylein.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">
    <title>StudentAdviseHub</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <div class="container">
        <img src="./logo.png" alt="Icon" width="200px" height="200px">
        
        <div id="navbar">
            <img src="css.png" alt="">
            <ul>
                <li><a href="./index.php">HOME</a></li>
                <li><a href="#">PROFILE</a></li>
                <div class="dropdown">
                    <li><a href="./appointment.php">APPOINTMENT</a></li>
                    <div class="dropdown-content">
                        <li><a href="#">MY APPOINTMENTS</a></li>
                    </div>
                </div>
                <li><a href="./about.php">ABOUT US</a></li>
                <li><a href="#">CONTACT</a></li>
                <li><a href="logout.php">LOG OUT</a></li>
            </ul>
        </div>
        <h1>StudentAdviseHub</h1>  
    </div>

    <!-- Appointment Table -->
    <div class="container">
        <h2>Pending Appointments</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Student #</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Reason</th>
            </tr>
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "qmet_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare SQL statement
            $stmt = $conn->prepare("SELECT * FROM appointments WHERE student_number = ? ORDER BY appointment_date DESC");
            $stmt->bind_param("s", $student_number);

            // Set parameter and execute
            $student_number = $_SESSION['studentnum'];
            $stmt->execute();

            // Get result
            $result = $stmt->get_result();

            // Display appointment data
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['student_number'] . "</td>";
                echo "<td>" . $row['appointment_date'] . "</td>";
                echo "<td>" . $row['start_time'] . "</td>";
                echo "<td>" . $row['end_time'] . "</td>";
                echo "<td>" . $row['reason'] . "</td>";
                echo "</tr>";
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
            ?>
        </table>
    </div>
    <!-- End of Appointment Table -->

</body>
</html>

<?php 
} else {
    exit;
}
?>
