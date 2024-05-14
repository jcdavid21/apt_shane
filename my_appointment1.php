<?php
include 'connection.php';

if(isset($_POST['logout'])){
    session_destroy();
    header('location:index.php');
}
?>

<?php 
if (isset($_SESSION['user_id'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylein1.css">
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
            background-color: maroon;
            color: white;
        }

    
    </style>
</head>
<body>

    <div class="container" style="display: flex; justify-content: space-between; border-bottom: 1px solid #800000">
    
        <img src="./logo.png" alt="Icon" width="auto" height="80px" >
        
        <h1 style="width: 40%; align-self: center;">StudentAdviseHub</h1>  

        <div id="navbar" style="align-self: center">
            <img src="css.png" alt="">
            <ul>
                <li><a href="./index1.php">HOME</a></li>
                <li><a href="./profile.php">PROFILE</a></li>
                <div class="dropdown">
                
                <li><a href="./my_appointment1.php">MY APPOINTMENTS</a></li>
        
                </div>
                <li><a href="./about1.php">ABOUT US</a></li>
                
                <li><a href="./logout.php">LOG OUT</a></li>
            </ul>
        
        </div>
        

    </div>

    <!-- Appointment Table -->
    <div class="container" style="padding: 50px">
    <h2 style="text-align: center">My Appointments</h2>
    <table>
        
        <?php
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

        // Get distinct professor names
        $sql = "SELECT DISTINCT professor_name FROM appointments";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output appointments for each professor
            while ($row = $result->fetch_assoc()) {
                $professor_name = $row['professor_name'];
                echo "<h2>Appointments for Professor: $professor_name</h2>";

                // Prepare SQL statement to fetch appointments for this professor
                $stmt = $conn->prepare("SELECT * FROM appointments WHERE professor_name = ?");
                $stmt->bind_param("s", $professor_name);
                $stmt->execute();
                $appointments_result = $stmt->get_result();

                // Display appointments in a table
                echo "<table border='1'>";
                echo "<tr><th>Name</th><th>Student #</th><th>Date</th><th>Start Time</th><th>End Time</th></tr>";
                while ($appointment = $appointments_result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $appointment['name'] . "</td>";
                    echo "<td>" . $appointment['student_number'] . "</td>";
                    echo "<td>" . $appointment['appointment_date'] . "</td>";
                    echo "<td>" . $appointment['start_time'] . "</td>";
                    echo "<td>" . $appointment['end_time'] . "</td>";
                    
                    // Cancel button with form submission
                    echo "<td>";
                    echo "<form method='post' action='./cancel_appointment.php'>";
                    echo "<input type='hidden' name='appointment_id' value='" . $appointment['id'] . "'>"; // Assuming id is the primary key of appointments table
                    
                    echo "</form>";
                    echo "</td>";
                    
                    echo "</tr>";
                }

                // Close statement
                $stmt->close();

                echo "</table>";
            }
        } else {
            echo "No appointments found.";
        }

        // Close connection
        $conn->close();
        ?>
    </table>
</div>
    <!-- End of Appointment Table -->

</body>
</html>
<?php } else {
    exit;
} ?>
