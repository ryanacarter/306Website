<?php
// we have values, let's try to insert new student into the db
	// connect
	$db = new mysqli( 'localhost', 'root', 'checkout', 'meal_plan' );
	
	// extract our values from $_POST
	extract( $_POST );
	
	// SQL statement
	$query = "SELECT rfid FROM user WHERE e_id = $eid";
	
	// run the statement
	if ($result = $db->query($query)) 
	{
		$finfo = $result->fetch_array();
	
		$rfid = $finfo["rfid"];
		
		$cmp = strcmp($rfid."", "");	
		
		if ($cmp < 1)
		{
			header("Location: index.php?error=2");
		}
		
		else
		{
			setcookie("rfid", $rfid."");

			header("Location: main.php");
		}
	}
	else
	{
		header("Location: index.php?error=2");
	}
