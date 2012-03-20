<?php

session_start();
require_once 'databaseconnect.php';
require_once 'functions.func.php';
?>

<html>
    <head>
        <title>Susan's Blog</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div class="wrapper">
			<?php
			displayTop();

			if(isset($_SESSION['id'])) {
                            statistics ($_SESSION['id']);
                            getEntries ($_SESSION['id']);
			} else {
				echo "currently not logged in as a user";
			}
    	                    
                        if(isset($_GET['delete'])) {
                            deleteEntry($_GET['delete']);
                        }
                        if(isset($_GET['edit'])){
                            $row = getEntry($_GET['edit']);
                            printEntryForm($row['title'],$row['entry'],
                            $row['postid']);
                        }
                        if(isset($_POST['edit_entry'])) {
                            addEntry($_POST['title'],$_POST['entry'],$_POST['postid']);
                        }
                        ?>
		</div>
	</body>
</html>