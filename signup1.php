<?php include './connection.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">
    <title>StudentAdviseHub</title>
</head>
<body>

    <div class="container">
    <img src="./signup.png" alt="Icon" width="350px" height="750px" >

       
    </div>

   

<div class="item">

</div>

<div class="item1">


<img src="./logos.png" alt="Icon" width="350px" height="350px" >


  
</div>


   <div class="box">

    
    <div class="log_in">
<form action="signupconnection1.php" method="post">
    <h1>Create Account</h1>
    <div class="social-container">
        

        
    <div class="cred">
        <input type="text"  name="lastname" placeholder="Last Name" required />
        <input type="text"  name="firstname" placeholder="First Name" required />
        <input type="text"  name="middlename" placeholder="Middle Name(Optional)" optional />
        <input type="text"  name="teachernum" placeholder="Teacher ID" required />
      <input type="text" name="username" placeholder="Username" required/>
      <input type="password"  name="password" title="Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character" placeholder="Password" required />
      <input type="password"  name="repeat_password" placeholder="Re-type Password" required />
      <input type="text"  name="address" placeholder="Address" required />
      <input type="text"  name="cellphone" placeholder="Contact #" required />
      

      </div> 

      <div class="terms-checkbox">
            <input type="checkbox" id="agree-terms" name="agree-terms" required>
            <label for="agree-terms">I agree to Terms of User</label>
        </div>
        

      </div>
      <div class="but">
      <a href="./login.php"><p>Have already an account?</p></a>
      <a href="./login1.php"><p>Professor Account?</p></a>
      <div class="inputBox"> 

      
      <input type="submit" name="btn_reg" value="SIGN-UP">
       

      </div> 
      </div>


      </form>
      
      
    </div>

    

   




    </div>
</body>
</html>