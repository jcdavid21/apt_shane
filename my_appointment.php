<?php

include 'connection.php'; // Include the database connection file

if(isset($_POST['logout'])){
    session_destroy();
    header('location:index.php');
    exit; // Terminate script after redirection
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

        .container h2{
            margin-top: 130px;
            margin-left: 800px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    
        
      

    <div class="container" style="display: flex; justify-content: space-between; border-bottom: 1px solid #800000">

<img src="./logo.png" alt="Icon" width="auto" height="80px" >

<h1 style="width: 40%; align-self: center;">StudentAdviseHub</h1>  

<div id="navbar">
    <img src="css.png" alt="">
    <ul>
        <li><a href="./index.php">HOME</a></li>
        <li><a href="./profile1.php">PROFILE</a></li>
        <div class="dropdown">
        <li><a href="./appointment.php">APPOINTMENT</a></li>
        <div class="dropdown-content">
        <li><a href="./my_appointment.php">MY APPOINTMENTS</a></li>
        </div>
        </div>
        <li><a href="./about.php">ABOUT US</a></li>
        
        <li><a href="./logout.php">LOG OUT</a></li>
    </ul>
   
</div>


</div>

    <!-- Appointment Table -->
    <div class="container">
    <h2>My Appointments</h2>
    <table>
        <tr>
            <th>Professor</th>
            <th>Name</th>
            <th>Student #</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Action</th> <!-- New column for edit and cancel button -->
        </tr>
        <?php

        $query = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $_SESSION["user_id"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $query2 = '';
        if($data["role"] == 'teacher'){
            $query2 = 'prof_id';
        }else{
            $query2 = 'user_id';
        }

        // Prepare SQL statement
        $stmt = $conn->prepare("SELECT * FROM appointments WHERE $query2 = ? ORDER BY appointment_date DESC");
        $stmt->bind_param("i", $_SESSION['user_id']);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Display appointment data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['professor_name'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['student_number'] . "</td>";
            echo "<td>" . $row['appointment_date'] . "</td>";
            echo "<td>" . date('H:i', strtotime($row['start_time'])) . "</td>";
            echo "<td>" . date('H:i', strtotime($row['end_time'])) . "</td>";

            
            // Edit button with form submission
            echo "<td>";
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='appointment_id' value='" . $row['id'] . "'>";
            echo "<input type='hidden' name='edit_mode' value='true'>";
            echo "<input type='submit' value='Edit'>";
            echo "</form>";

            // Cancel button with form submission
            echo "<form method='post' action='cancel_appointment.php'>";
            echo "<input type='hidden' name='appointment_id' value='" . $row['id'] . "'>";
            echo "<input type='submit' value='Cancel'>";
            echo "</form>";
            echo "</td>";
            
            echo "</tr>";

            // If edit mode is active for this row
            if (isset($_POST['edit_mode']) && $_POST['appointment_id'] == $row['id']) {
                echo "<tr>";
                echo "<td colspan='6'>";
                echo "<form method='post' action='edit_appointment.php'>";
                echo "<input type='hidden' name='appointment_id' value='" . $row['id'] . "'>";
                echo "<input type='text' name='name' value='" . $row['name'] . "' placeholder='Name'>";
                echo "<input type='text' name='student_number' value='" . $row['student_number'] . "' placeholder='Student #'>";
                echo "<input type='date' name='appointment_date' value='" . $row['appointment_date'] . "' placeholder='Date'>";
                echo "<input type='time' name='start_time' value='" . $row['start_time'] . "' placeholder='Start Time'>";
                echo "<input type='time' name='end_time' value='" . $row['end_time'] . "' placeholder='End Time'>";
                echo "<input type='submit' name='submit' value='Save'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
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
<?php } else {
    exit; // Terminate script if session user_id is not set
} ?>
