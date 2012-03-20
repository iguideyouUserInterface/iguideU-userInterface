<?php

	if(isset($_GET['showcomment'])) {
            require_once 'databaseconnect.php';

            $id = $_GET['showcomment'];
            $query=" SELECT * FROM blog
                INNER JOIN comment
                ON postid = blogid
                WHERE blog.postid = '$id'
                ORDER BY blogdate DESC";

            $result = mysql_query($query) or print
            ("Can't select entry from table blog.<br />"
            . $query . mysql_error());


            while($row = mysql_fetch_array($result)) {
                $idcomment = $row[0];
                $numberOfComments++;
                echo "<div id= 'blog'>" . "<p>" . $row['commentdate'] ."<br/>". $row['comment'] .
                "<br/>". "written by:".$row['name']."<br/>".$row['email']. "</p>"."</div>";
            }
	}
?>

