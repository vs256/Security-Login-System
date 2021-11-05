<?php
require_once 'php/utils.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf_token" content="<?php echo createToken(); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Secure Site</title>
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['SERVER_NAME']) . '/clothingBusiness.css' ?>" />

</head>

<body>

    <div class="container">
        <div class="background">
            <div class="createBox">
                <a href="./login.php">
                    <img class="thread" src="./php/images/loginAvatar.png" alt="Thread and Needle">
                </a>
                <h2>
                    Create Account
                </h2>
                <form>
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" autocomplete="name" placeholder="Enter Your Name" onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}" />
                    <label for="dob">Date of Birth</label>
                    <input id="dob" name="dob" type="text" autocomplete="bday" placeholder="MM/DD/YYYY" onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}" />
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" placeholder="Enter Your Email" onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}" />
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" placeholder="Enter Your Password" onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}" />
                    <label for="confirm-password">Confirm Password</label>
                    <input id="confirm-password" name="confirm-password" type="password" autocomplete="new-password" placeholder="Confirm Your Password" onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}" />
                    <!--Select is a drop down menu.-->
                    <label>Please Pick A Security Question To Answer.</label>
                    <select name="languages" id="">
                        <option value="question1">What Street Did You Grow Up On?</option>
                        <option value="question2">What Was The Name Of Your First Pet?</option>
                        <option value="question3">What Elementary School Did You Attend?</option>
                        <option value="question4">What Was The Make And Model Of Your First Car?</option>
                        <option value="question5">Where Did Your Parents Meet?</option>
                        <option value="question6">?</option>

                    </select>
                    <input id="answer" type="text" name="answer" autocapitalize="characters" required placeholder="Enter Your answer" onkeydown="if(event.key === 'Enter'){event.preventDefault();login();}">
                    <!-- <button type="submit"> Submit</button> -->
                    <input type="submit" onclick="register();" name="submit" placeholder="Register">
                    <br>
                    <a href="./resetpassword"> Forgot Password?</a>
                    <br>
                    <a href="./login">Already have an account? Log In</a>
                    <br>
                </form>
            </div>
        </div>

    </div>


    <script src="<?php echo dirname($_SERVER['SERVER_NAME']) . '/script.js' ?>"></script>
</body>

</html>