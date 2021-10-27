<?php
    $msg = "";

    /* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "admin", "computersecurity");
 
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
    <title> - Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3" align="center">
<?php if ($msg != "") echo $msg . "<br><br>"; ?>
            <img src="images/logo.png"><br><br>

            <form method="post" action="login.php">
                <input class="form-control" name = "email" type="email" placeholder="Email..."><br>
                <input class="form-control" minlength="5" name = "password" type="password" placeholder="Password..."><br>
                <input class="btn btn-primary" name = "submit" type="submit" placeholder="Login..."><br>
            </form>

        </div>
    </div>
</div>
</body>
</html>