<?php

	// get the eid and the condition from the url
	if( $rfid = $_COOKIE['rfid'] )
	{
		// Connect to the database
		$db = new mysqli('localhost', 'root', 'root', 'meal_plan');
	
		$query = "SELECT * FROM user WHERE rfid = $rfid";

		if ($result = $db->query($query) ) {
		
			$finfo = $result->fetch_array();

				$punches = $finfo["punches"];

			}


		if ($punches > 0)
		{
			$db->query("UPDATE user SET punches = punches - 1 WHERE rfid = $rfid AND punches > 0");
			$location = "index.php";
		}
		else
	 		$location = "noMorePunches.php?rfid=" . $rfid;

	
		setcookie("rfid");
	

		header("location: $location");
	
	}
	else
		header("location: index.php");



?>
