<?php
require_once 'databaseconnect.php';
        
$query = "SELECT title, entry, blogdate FROM blog ORDER BY blogdate DESC LIMIT 5";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());;

//creates a 2D array called $return, each index containing an array with the content title and entry
while ($line = mysql_fetch_assoc($result)) {
            $return[] = $line;
        }

//first part of the xml output, this variable will contain all the final output
$output = '<?xml version="1.0" encoding="ISO-8859-1" ?>
			<rss version="2.0">
				<channel>
					<title>Blogie Page</title>
					<link>http://localhost/blogtest/index.php</link>
					<description>RSS feed from blogie</description>';
					
//loops through the $return	array and asign the current index to the variable $line
foreach ($return as $line) {
	//here we add items to the output, they each contain a title and an entry but more can be added
	$output .= "<item><title>" . $line['title'] . "</title><description>" . 
	$line['entry'] . "</description><pubDate>" . $line['blogdate'] . "</pubDate></item>";
}					

//we finaly add the closing tags
$output .= "</channel></rss>";

header("Content-Type: application/rss+xml");
echo $output
?>