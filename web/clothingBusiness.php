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

        $email = $con->real_escape_string($_POST['email']);
        $password = $con->real_escape_string($_POST['password']);
       
        $sql = $con->query("SELECT id, password FROM users WHERE email='$email'");
        if($sql->num_rows > 0)
        {
            $data = $sql->fetch_array();
            if (password_verify($password, $data['password']))
            {
                $msg = "You have been logged IN!";
            }
            else{
                
            $msg = "Wrong password!";
            }
        }
        else {
            $msg = "Please check your inputs!";
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
            <div class="inputBox">
                <a href="./clothingBusiness.html">
                    <img class="thread" src="./images/LoginAvatar.png" alt="Thread and Needle" >
                </a>
                <h1>
                    Login
                </h1>
                    <form method="post" action="clothingBusiness.php">
                        <p>Email</p>
                        <input type="email" name= "email" placeholder="Enter Username or Email">
                        <p>Password</p>
                        <input type="password" name="password" placeholder="Enter Password">
                        <input type="submit" name="submit" placeholder="Login">
                        <br>
                        <a href="./clothingBusinessForgot.html"> Forgot Password?</a>
                        <br>
                        <a href="./clothingNewUser.html">New User? Create Account Here</a>
                    </form>
            </div>
        </div>
        
    </div>
</body>
</html>