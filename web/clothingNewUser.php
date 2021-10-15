<?php
    $msg = "";

    /* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "test", "computersecurity");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Print host information
echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);

    if(isset($_POST['submit'])){
        $con = new mysqli("localhost", "test", "computersecurity", "passwordHashing");

        $name = $con->real_escape_string($_POST['name']);
        $email = $con->real_escape_string($_POST['email']);
        $password = $con->real_escape_string($_POST['password']);
        $cPassword = $con->real_escape_string($_POST['cPassword']);
        

        if ($password != $cPassword)
        {
            $msg = "Please Check Your Passwords!";
        }
        else
        {
            
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $con->query("INSERT INTO users(name,email,password) VALUES ('$name','$email','$hash')" );
            
            $msg = "You have been registered!";

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="./clothingBusiness.css" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="background">
            <div class="createBox">
                <a href="./clothingBusiness.html">
                    <img class="thread" src="./images/loginAvatar.png" alt="Thread and Needle" >
                </a>
                <h1>
                    Create Account
                </h1>
                    <form >
                        <p>Name</p>
                        <input type="name" name= "name" placeholder="Enter Your Name">
                        <p>Date of Birth</p>
                        <input type="text" name= "dob" placeholder="MM/DD/YYYY">
                        <p>Email</p>
                        <input type="email" name= "email" placeholder="Enter Email">
                        <p>Password</p>
                        <input type="password" name="password" placeholder="Enter Password">
                        <p>Confirm Password</p>
                        <input type="password" name="cPassword" placeholder="Enter Password">
                        <input type="submit" name="submit" placeholder="Register">
                        <br>
                        <a href="./clothingBusinessForgot.html"> Forgot Password?</a>
                        <br>
                    </form>
            </div>
        </div>
        
    </div>
</body>
</html>