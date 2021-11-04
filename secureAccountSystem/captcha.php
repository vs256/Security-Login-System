<?php 

    foreach($_POST as $key => $value){
        echo "'key: ' .$key . 'value: ' .$value. '<br />'";    
    }

    if(isset($_POST['g-recaptcha-response'])){
        $captcha = $_POST['g-recaptcha-response'];
    }

    if(!$captcha || empty($captcha)){
        echo 'repatcha verification failed';
        exit;
    }

    $secretkey = "6LdoQxMdAAAAANVWPICwS5Px2PMo2G0e3oHOv0O2";
    $ip = $SERVER['REMOTE_ADDR'];

    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.urlencode($secretkey).'response: '.urlencode($captcha);
    $response = file_get_contents($url);
    $responseKeys = json_decode($response, true);

    if($responseKeys["success"]){
        echo 'captcha verification successful';
    }
    else { 
        echo 'It is a robot!';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>reCaptcha v3</title>
</head>
<body>
    <form action="/" method="post">
        <input type="text" name="name">
        <br>
        <input type="text" name="">
        <br>
        <div class="g-recaptcha" data-sitekey="6LdoQxMdAAAAAI1iC2QqRB41Hxika4ohpJa3k5p3"></div>
        <br>
        <input type="submit" value="submit">
    </form>
</body>
</html>