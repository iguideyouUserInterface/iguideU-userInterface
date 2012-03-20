<?php

if(isset($_POST['submit_comment']) ) {
    
    $name = mysql_real_escape_string($_POST['name']);
    $email = mysql_real_escape_string($_POST['email']);
    $website = mysql_real_escape_string($_POST['website']);
    $comment = mysql_real_escape_string($_POST['comment']);
    $blogid = $_POST['postid'];

    if(isset($_SESSION['id'])) {
        $userid = $_SESSION['id'];
    }
    
    $query = "SELECT * FROM comment
              WHERE blogid = $blogid
              ORDER BY commentdate DESC
           ";
   
  
    if(isset($userid))
    {
        $query = "INSERT INTO comment 
            (name,email,website,comment,blogid,commentdate, userid)
            VALUES ('$name','$email','$website','$comment', '$blogid', NOW(), '$userid')            
        ";
    } else {
        $query = "INSERT INTO comment
            (name,email,website,comment,blogid,commentdate)
            VALUES ('$name','$email','$website','$comment', '$blogid', NOW())
        ";
    }
    
    if(mysql_query($query)) {
        echo "Your post has been saved into the database!";
    } else {
        echo "Something is wrong with comments!";
    }
}

function printCommentForm ($postID) { 
	?>
	<form method="post" action="?">
    	<input type="hidden" name="postid" id="postid" value="<?= $postID; ?>" />
    	<label for="name">Name:</label>
    	<input type="text" name="name" id="name" size="25" /><br />
    	<label for="email">E-mail:</label>
    	<input type="text" name="email" id="email" size="25" /><br />
  	<label for="website">Website:</label>
   	<input type="text" name="website" id="website" size="25" value="http://" /><br />
   	<label for="comment">Comment:</label><br />
    	<textarea cols="25" rows="5" name="comment" id="comment"></textarea>
    	<input type="submit" name="submit_comment" id="submit_comment" value="Add Comment" />
	</form>
	<?php 
} 
?>

