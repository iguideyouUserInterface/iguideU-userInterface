<?php
require_once 'databaseconnect.php';
require_once 'functions.func.php';

if ($_POST['form_submitted'] == '1') {
	if (!empty($_POST['email']) && !empty($_POST['password'])) {

		$activationKey = mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();

		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		//$name = mysql_real_escape_string($_POST['name']);
		// $website = mysql_real_escape_string($_POST['website']);

		// generate strong unique salt
		$salt = uniqid(mt_rand());

		//combine email, password, and salt together
		//$combine = $email . $password . $salt;
		$combine = $password . $salt . $password;

		//hash everything
		$newpassword = sha1($combine);

		$query = "SELECT * FROM users WHERE email = '$email'";

		$data = mysql_query($query);
		if (mysql_num_rows($data) == 0) {

			$query = "INSERT INTO users
            (password, email, usersalt, date, activationkey, status)
             VALUES
            ('$newpassword', '$email', '$salt', NOW(), '$activationKey', 'verify')";

		} else {// An account already exists for this username, so display an error message
			echo '<p class="error">An account already exists for this email. Please use a different ' . 'address.</p>';

			$email = "";
		}

		if (mysql_query($query)) {

			echo "An email has been sent to $_POST[email] with an activation key. Please check your mail to complete registration.";

			##Send activation Email

			$to = $_POST[email];

			$subject = " iguideu.com Registration";

			$message = "Welcome to our website!\r\rYou, or someone using your email address, has completed registration at iguideu.com. 
		You can complete registration by clicking the following link:\rhttp://10.1.10.107:8888/iguideUserIn/index.php?$activationKey\r\r
		If this is an error, ignore this email and you will be removed from our mailing list.\r\rRegards,\ iguideu.com Team";

			$headers = 'From: info@iguideu.com' . "\r\n" . 'Reply-To: noreply@ iguideu.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers);
		} else {
			echo 'fail';
		}
	} 
} else {
		## No value found, user must be activating their account!
		##User isn't registering, check verify code and change activation code to null, status to activated on success
		require_once 'functions.func.php';
		
		$queryString = $_SERVER['QUERY_STRING'];

		$query = "SELECT * FROM users";

		$result = mysql_query($query) or die(mysql_error());

		while ($row = mysql_fetch_array($result)) {

			if ($queryString == $row["activationkey"]) {

				echo "Congratulations!" . $row["email"] . " you are now register";

				$sql = "UPDATE users SET activationkey = '', status='activated' WHERE (id = $row[id])";

				if (!mysql_query($sql)) {

					die('Error: ' . mysql_error());
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<title>iguideU registration page</title>
	</head>
	<body>
		<div class="wrapper">
			<?
			displayTop();
			?>
			<div id="registerPage">
				<p>
					Please complete the form to sign up to iguideU.
				</p>
				<form method="post" action="#">
					<fieldset>
						<legend>
							Registration Info
						</legend>
						<label for="email">E-mail:</label>
						<input type="text" id="email"name="email" />
						<br />
						<label for="password">Password:</label>
						<input type="password" id="password"name="password" />
						<br />
					</fieldset>
					<input type="hidden" name="form_submitted" value="1"/>
					<input type="submit" value="Sign Up" name="submit" />
				</form>
			</div>
		</div>
	</body>
