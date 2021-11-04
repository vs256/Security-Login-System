<!DOCTYPE HTML>
<!-- DO NOT FORGET TO CHANGE !YOUR_SECRET_KEY! to YOUR SECRET KEY FROM GOOGLE ADMIN CONSOLE - row 24 -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>reCAPTCHA v2 | response</title>
	</head>
	<body>
		<?php
			foreach ($_POST as $key => $value) {
				echo 'key: '.$key.' value: '.$value.'<br />';
			}

			if(isset($_POST['g-recaptcha-response'])) {
				$captcha = $_POST['g-recaptcha-response'];
			}

			if(!$captcha || empty($captcha)) {
				echo 'recaptcha verification failed';
				exit;
			}

			$secretKey = '!YOUR_SECRET_KEY!';
			$ip = $_SERVER['REMOTE_ADDR'];

			$url = 'https://www.google.com/recaptcha/api/siteverify?secret='.urlencode($secretKey).'&response='.urlencode($captcha);
			$response = file_get_contents($url);
			$responseKeys = json_decode($response, true);

			if($responseKeys["success"]) {
				echo 'captcha verification succesful';
			} else {
				echo 'Hello, robot!';
			}
		?>
  </body>
</html>
