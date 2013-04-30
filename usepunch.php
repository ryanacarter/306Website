<?php

	// get the eid and the condition from the url
	if( $rfid = $_COOKIE['rfid'] )
	{
		// Connect to the database
		$db = new mysqli('localhost', 'root', 'checkout', 'meal_plan');
	
		// query statement to pull the amount of punches left
		$query = "SELECT * FROM user WHERE rfid = \"$rfid\"";
		
		// run the statement
		if ($result = $db->query($query) ) {
			
			// get the array returned
			$finfo = $result->fetch_array();
			
			// pull of the number of punches
			$punches = $finfo["punches"];
		}


		// make sure there are enough punches
		if ($punches > 0)
		{
			// run the statement
			$db->query("UPDATE user SET punches = punches - 1 WHERE rfid = \"$rfid\" AND punches > 0");
			
			// reset the cookie to null
			setcookie("rfid");
			
			// redirect back to the index page
			header("location: index.php");
		}
		// if they do not have enough punches send the user to the error page
		else
			header("location: noMorePunches.php");
		
	
	}
	else
	{
		// reset cookie and go to the main page.
		setcookie("rfid");
		header("location: index.php");
	}



?>
