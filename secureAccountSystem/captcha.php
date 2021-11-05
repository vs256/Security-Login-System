<!DOCTYPE HTML>
<!-- DO NOT FORGET TO CHANGE !YOUR_SITE_KEY! to YOUR SITE KEY FROM GOOGLE ADMIN CONSOLE - row 16 -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>reCAPTCHA v2</title>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</head>
	<body>
		<h2>reCAPTCHA v2</h2><br />
		<form action="response.php" method="post">
			<label for="nick">Nick:</label>
			<input type="nick" name="nick" />
			<br /><br />
			<div class="g-recaptcha" data-sitekey="6LdoQxMdAAAAAI1iC2QqRB41Hxika4ohpJa3k5p3"></div>
			<br />
			<button type="submit">Submit me</button>
		</form>
  </body>
</html>
