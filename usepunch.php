<?php

	// get the eid and the condition from the url
	if( $rfid = $_COOKIE['rfid'] )
	{
		// Connect to the database
		$db = new mysqli('localhost', 'root', 'checkout', 'meal_plan');
	
		$query = "SELECT * FROM user WHERE rfid = \"$rfid\"";

		if ($result = $db->query($query) ) {
		
			$finfo = $result->fetch_array();

				$punches = $finfo["punches"];

			}


		if ($punches > 0)
		{
			$db->query("UPDATE user SET punches = punches - 1 WHERE rfid = \"$rfid\" AND punches > 0");
			setcookie("rfid");
			header("location: index.php");
		}
		else
			header("location: noMorePunches.php");
		
	
	}
	else
	{
		setcookie("rfid");
		header("location: index.php");
	}



?>
