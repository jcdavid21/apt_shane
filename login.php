<!DOCTYPE html>
<?php 
    session_start();
    unset($_SESSION["user_id"]);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-a70GOS+MKBjmwx6+6jq9ubL1maWPQwOqcKoDfS+hTqqDcbWekAxhC3vXE08kv7RS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-a70GOS+MKBjmwx6+6jq9ubL1maWPQwOqcKoDfS+hTqqDcbWekAxhC3vXE08kv7RS" crossorigin="anonymous">

    <title>StudentAdviseHub</title>
    <style>
        .show-password {
            position: relative;
            top: -30px;
            right: -140px;
            background-color: transparent;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 14px;
            color: #333;
            text-decoration: underline;
        }

        label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

/* Styling for select dropdown */
select {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
    font-size: 16px;
    margin-bottom: 16px;
    box-sizing: border-box; /* Ensures padding and border are included in width */
}

/* Styling for select dropdown option */
option {
    padding: 8px;
}
    </style>
</head>
<body class="login">

    <div class="row">
        <div class="col logo-area" style="width: 70%">
            <div class="item">
                <img class="login-logo" src="./logo.png" alt="Icon">
                <h1>Student Advise Hub</h1>
            </div>

            <div class="item1">
                <img src="./logos.png" alt="Icon">
                <h2>OUR LADY OF FATIMA UNIVERSITY</h2>
                <h3>COLLEGE OF COMPUTER STUDIES</h3>
            </div>
        </div>

        <div class="col">
            <div class="box">
                <div class="log_in">
                    <form action="loginconnection.php" method="post">
                        <h1>Sign-In</h1>
                        <div class="social-container">
                            <a href="#" class="social"><i class="ri-facebook-fill"></i></a>
                            <a href="#" class="social"><i class="ri-google-fill"></i></i></a>
                            <a href="#" class="social"><i class="ri-twitter-fill"></i></a>
                            <br><span>Please enter your email and password</span>
                            <div class="cred">
                                <input type="text" name="username" placeholder="Username" required/>
                                <input type="password" id="password" name="password" placeholder="Password" required />
                                <i class="fas fa-eye"></i> <!-- Font Awesome eye icon --> <button type="button" class="show-password" onclick="togglePassword()">
                                
                                </button>

                                <label for="portal">Select Portal:</label>
                                <select name="portal" id="portal" required>
                                    <option value="">Select Portal</option>
                                    <option value="student">Student Portal</option>
                                    <option value="teacher">Teacher Portal</option>
                                </select><br><br>
                            </div>
                        </div>
                        <div class="but">
                            <a href="signup.php"><p>Don't have an account?</p></a>
                            <div class="inputBox"> 
                                <input type="submit" name="btn_log" value="Log-in"> 
                            </div> 
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    
</body>
</html>
