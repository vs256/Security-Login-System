<?php
    $msg = "";

    
    if(isset($_POST['submit'])){
        $con = new mysqli('localhost', 'root', 'computersecurity', 'passwordHashing');

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
            $hash = password_hash($password, algo: PASSWORD_BCRYPT);
            //$con->query(query: "INSERT INTO users(name,email,password) VALUES ('$name','$email','$hash')");
            //$msg = "You have been registered!";

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Password Hashing - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3" align="center">
<?php if ($msg != "") echo $msg . "<br><br>"; ?>
            <img src="images/logo.png"><br><br>

            <form method="post" action="register.php">
                <input class="form-control" minlength="3" name = "name" placeholder="Name..."><br>
                <input class="form-control" name = "email" type="email" placeholder="Email..."><br>
                <input class="form-control" minlength="5" name = "password" type="password" placeholder="Password..."><br>
                <input class="form-control" minlength="5" name = "cPassword" type="password" placeholder="Confirm Password..."><br>
                <input class="btn btn-primary" name = "submit" type="submit" placeholder="Register..."><br>
            </form>

        </div>
    </div>
</div>
</body>
</html>