<?php

// get the eid and the condition from the url
	if( $rfid = $_COOKIE['rfid'] )
	{
		// Connect to the database
		$db = new mysqli('localhost', 'root', 'checkout', 'meal_plan');
	
		// SQL statement to pull the users information
		$query = "SELECT * FROM user WHERE rfid = \"$rfid\"";
		
		// run the statement
		if ($result = $db->query($query) ) {
			
			// put the array, then set a variable with amount of punches left.
			$finfo = $result->fetch_array();
			$punches = $finfo["punches"];

		}

		// make sure that there are enough punches left.
		if ($punches > 1)
		{
			// run the statement, delete the cookie, the redirect to the index page.
			$db->query("UPDATE user SET punches = punches - 2 WHERE rfid = \"$rfid\" AND punches > 0");
			setcookie("rfid");
			header("location: index.php");
		}
		// if they do not have enough go to the error page.
		else
			header("location: noMorePunches.php");
		
	
	}
	else
	{
		// reset the cookie and go to the main page.
		setcookie("rfid");
		header("location: index.php");
	}



?>
