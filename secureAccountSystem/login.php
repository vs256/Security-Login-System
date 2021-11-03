<?php 
	require_once 'php/utils.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf_token" content="<?php echo createToken(); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Secure Site</title>
	<link rel="stylesheet" href="<?php echo dirname($_SERVER['SERVER_NAME']) . '/clothingBusiness.css' ?>" />
</head>
<body>
<div class="container">
        <div class="background">
            <div class="inputBox">
                <a href="./clothingBusiness.html">
                    <img class="thread" src="./php/images/loginAvatar.png" alt="Thread and Needle" >
                </a>
                <h1>
                    Login
                </h1>
                    <form id="loginForm" >
                        <div id="errs" class="errorcontainer"></div>
                        <label for="email">Email</label>
				        <input id="email" name="email" type="email" autocomplete="email" required placeholder="Enter your Email" onkeydown="if(event.key === 'Enter'){event.preventDefault();login();}"/>   
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="Enter Your Password" onkeydown="if(event.key === 'Enter'){event.preventDefault();login();}"/>
                        <input type="submit" onclick="login();" name="submit" placeholder="Login">
                        <br>
                        <a href="./resetpassword"> Forgot Password?</a>
                        <br>
                        <a href="./register">New User? Create Account Here</a>
                    </form>
            </div>
        </div>
        
    </div>

	<script src="<?php echo dirname($_SERVER['SERVER_NAME']) . '/script.js' ?>"></script>
</body>
</html>
