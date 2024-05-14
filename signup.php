<?php include './connection.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">
    <title>StudentAdviseHub</title>
</head>
<body class="login">

    
    <div class="row">

        <div class="col logo-area" style="width: 70%">
            <div class="container">
                <img src="./signup.png" alt="Icon" width="350px" height="750px" >
            </div>
        </div>

        <div class="col">
            <div class="box">

                
                <div class="log_in">
                <form action="signupconnection.php" method="post">
                <h1>Create Account</h1>
                <div class="social-container">
                    

                    
                <div class="cred">
                    <input type="text"  name="lastname" placeholder="Last Name" required />
                    <input type="text"  name="firstname" placeholder="First Name" required />
                    <input type="text"  name="middlename" placeholder="Middle Name(Optional)" optional />
                    <input type="text"  name="studentnum" placeholder="Student Number" required />
                <input type="text" name="username" placeholder="Username" required/>
                <input type="password"  name="password" title="Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character" placeholder="Password" required />
                <input type="password"  name="repeat_password" placeholder="Re-type Password" required />
                <input type="text"  name="address" placeholder="Address" required />
                <input type="text"  name="cellphone" placeholder="Contact #" required />
                <label for="portal">Select Role:</label>
                                        <select name="portal" id="portal" required>
                                            <option value="">Select</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="student">Student</option>
                                        </select>


                </div> 

                <div class="terms-checkbox">
                        <input type="checkbox" id="agree-terms" name="agree-terms" required>
                        <label for="agree-terms">I agree to Terms of User</label>
                    </div>
                    

                </div>
                <div class="but">
                <a href="./login.php"><p>Have already an account?</p></a>
                <div class="inputBox"> 


                <input type="submit" name="btn_reg" value="SIGN-UP">


                </div> 
                </div>


                </form>


                </div>

                </div>
            </div>
        </div>

        

    </div>
</body>
</html>