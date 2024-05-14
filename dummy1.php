<?php
include 'connection.php';
// $user_id = $_SESSION['user_id'];

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header('location: login.php');
    exit();
}

// Retrieve user information from the database
$username = $_SESSION['username']; // Assuming studentnum is the identifier for the user
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // User found, fetch user data
    $userData = $result->fetch_assoc();
} else {
    // User not found, handle error (you can customize this part based on your application's logic)
    echo "Error: User not found!";
    exit();
}

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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container1 {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

       .container1 h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .container1 table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        .container1 th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .container1 th {
            background-color: #f2f2f2;
            color: #333;
        }

        .container1 tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .container1 a {
            display: block;
            width: 100px;
            margin: 0 auto;
            padding: 10px;
            text-align: center;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .container1 a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
    
        <img src="./logo.png" alt="Icon" width="200px" height="200px" >
        
      

    <div id="navbar">
        <img src="css.png" alt="">
        <ul>
            <li><a href="./index.php">HOME</a></li>
            <li><a href="./profile1.php">PROFILE</a></li>
            <div class="dropdown">
            <li><a href="./appointment.php">APPOINMENT</a></li>
            <div class="dropdown-content">
            <li><a href="./my_appointment.php">MY APPOINTMENTS</a></li>
            </div>
            </div>
            <li><a href="./about.php">ABOUT US</a></li>
            
            <li><a href="./logout.php">LOG OUT</a></li>
        </ul>
       
    </div>
    <h1>StudentAdviseHub</h1>  

    </div>
    <div class="container1">
        <h1>User Profile</h1>
        <table>
           
            <tr>
                <td>Username</td>
                <td><?php echo $userData['username']; ?></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><?php echo $userData['firstname']; ?></td>
            </tr>
            <tr>
                <td>Middle Name</td>
                <td><?php echo $userData['middlename']; ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?php echo $userData['lastname']; ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo $userData['address']; ?></td>
            </tr>
            <tr>
                <td>Cellphone Number</td>
                <td><?php echo $userData['cellphone']; ?></td>
            </tr>
        </table>
        <a href="logout.php">Logout</a>
    </div>

    
</body>
</html>
<?php }else {
	exit;
} ?>