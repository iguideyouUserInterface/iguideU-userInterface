<?php
require_once 'databaseconnect.php';
require_once 'functions.func.php';


    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        $username = mysql_real_escape_string($_POST['username']);
        $email= mysql_real_escape_string($_POST['email']);
        $password = mysql_real_escape_string($_POST['password']);
        //$name = mysql_real_escape_string($_POST['name']);
       // $website = mysql_real_escape_string($_POST['website']);

        // generate strong unique salt
        $salt = uniqid(mt_rand());

        //combine email, password, and salt together
        $combine = $email . $password . $salt;

        //hash everything
        $newpassword = sha1($combine);

        $query = "SELECT * FROM user WHERE username = '$username'";

        $data = mysql_query($query);
        if (mysql_num_rows($data) == 0) {

           $query = "INSERT INTO user
            (username, password, usersalt, email, date)
             VALUES
            ('$username', '$newpassword', '$salt', '$email', NOW())";



        } else { // An account already exists for this username, so display an error message
                echo '<p class="error">An account already exists for this username. Please use a different ' .
                'address.</p>';

                $username ="";
         }

        if(mysql_query($query)) {
            
            echo '<h1>Success</h1>';

            // Confirm success with the user

            echo '<p>Your new account has been successfully created. You\'re now ready to log in and ' .
                '<a href="#">edit your profile</a>.</p>';

        } else {
                echo '<h1>Failure</h1>';
          }
   }


?>
<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css" />
	<title>Blogy register page</title>
    </head>
        <body>
            <div class="wrapper">
            <?
	    displayTop();
	    ?>
                <div id="registerPage">
                    <p>Please complete the form to sign up to Blogyblogy.</p>
                    <form method="post" action="">
                         <fieldset>
                             
                            <legend>Registration Info</legend>
                            <label for="username">Username:</label>
                            <input type="text" id="username"name="username" /><br />
                            <label for="email">Email:</label>
                            <input type="text" id="email"name="email" /><br />
                            <label for="password">Password:</label>
                            <input type="password" id="password"name="password" /><br />
                            <label for="name">Name:</label>
                            <input type="text" id="name"name="name" /><br />
                            <label for="website">Website (Optional):</label>
                            <input type="text" id="website"name="website" /><br />
		
                        </fieldset>
                        <input type="submit" value="Sign Up" name="submit" />
                    </form>
                </div>
            </div>
        </body>