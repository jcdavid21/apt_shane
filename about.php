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
        <div class="xd">
            
    <img src="./edu.png" alt="Icon" width="400px" height="500px">
    <h1>About Us</h1>
    <p>Welcome to StudentAdviseHub, your premier destination for convenient and<br> personalized academic support and guidance. Our mission is to empower<br> students to succeed by connecting them with CCS professors dedicated to<br> providing tailored consultations. We provide easy access to high-quality<br> academic support, helping students overcome obstacles, set and achieve<br> goals, and thrive in their studies. Our values include being student-centered<br>, prioritizing individual needs and preferences, striving for excellence in every<br> consultation and interaction, maintaining integrity and professionalism, and<br> fostering inclusivity to create a supportive environment where all students<br> feel valued.</p>
    </div> 
    </div>
    
    

</body>
</html>
<?php }else {
	exit;
} ?>