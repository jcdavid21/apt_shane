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
</head>
<body>

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
    <div class="app">
         <!-- Appointment Form -->
         <form action="./save_appoinment.php" method="post" onsubmit="return validateForm()">
                            <label for="name">Name:</label><br>
                            <input type="text" id="name" name="name" required><br>

                            <label for="student_number">Student#:</label><br>
                            <input type="text" id="student_number" name="student_number" required><br>

                            <label for="portal">Select Professor:</label>
                            <select name="portal" id="portal" required>
                                <option value="">Select Professor</option>
                                <?php 
                                    $query = "SELECT professor_name, user_id FROM users WHERE role = 'teacher'";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    if($result->num_rows > 0){
                                        while($data = $result->fetch_assoc()){
                                    
                                ?>
                                    <option value="<?php echo $data['user_id']; ?>"><?php echo $data['professor_name']; ?></option>
                                <?php }} ?>
                            </select><br><br>

                            <label for="date">Date:</label><br>
                            <input type="date" id="appointment_date" name="appointment_date" required><br>

                            <label for="time">Start Time:</label><br>
                            <input type="time" id="start_time" name="start_time" required><br><br>

                            <label for="time">End Time:</label><br>
                            <input type="time" id="end_time" name="end_time" required><br><br>

                            <label for="TextArea">Reason of consultation</label><br>
                            <textarea id="TextArea" name="Desc" rows="4" cols="50"></textarea><br><br>

                            <input type="submit" value="Submit">
                        </form>
                        <!-- End of Appointment Form -->
    </div>

    <script>
        function validateForm() {
            // Get current date and time
            var currentDate = new Date();
            var currentTime = currentDate.getTime();

            // Get selected date and time from the form
            var selectedDate = new Date(document.getElementById("appointment_date").value);
            var selectedStartTime = new Date(selectedDate.toDateString() + " " + document.getElementById("start_time").value);
            var selectedEndTime = new Date(selectedDate.toDateString() + " " + document.getElementById("end_time").value);

            // Check if the selected date is in the past
            if (selectedDate.getTime() < currentDate.getTime()) {
                alert("Please select a future date.");
                return false;
            }

            // Check if the selected start time is in the past
            if (selectedStartTime.getTime() < currentTime) {
                alert("Please select a future start time.");
                return false;
            }

            // Check if the selected end time is before the selected start time
            if (selectedEndTime.getTime() <= selectedStartTime.getTime()) {
                alert("End time must be after start time.");
                return false;
            }

            return true;
        }
    </script>

</body>
</html>
<?php }else {
    exit;
} ?>