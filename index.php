<?php
include 'connection.php';
// $user_id = $_SESSION['user_id'];


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

    <div class="background">
    <img src="./bg.png" alt="Icon" width="100%" height="auto" >

    <p>&nbsp; &nbsp;Welcome to StudentAdviseHub, the Education Forum that connects students with professors, Out platform is designed to provide free academic<br>guidance to students, and facilitate student-professor communication, appointment schedulling. Join our community today and start exploring the<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;many benifits of StudentAdviseHub</p>

    </div>
</body>
</html>
<?php }else {
	exit;
} ?>