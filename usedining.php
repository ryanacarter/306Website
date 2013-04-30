<?php

	// we have values, let's try to insert new student into the db
	// connect
	$db = new mysqli( 'localhost', 'root', 'checkout', 'meal_plan' );
	
	// extract our values from $_POST
	extract( $_POST );
	
	// SQL statement
	$query = "SELECT dining FROM user WHERE rfid = \"$rfid\"";
	
	// run the statement
	if ($result = $db->query($query)) {

		// place the value into and array, then place them into a varriable
		$finfo = $result->fetch_array();
	
		$dining = $finfo["dining"];
	}

	// second statement is use to deduct the dining
	$query1 = "UPDATE user SET dining = dining - $diningAmount WHERE rfid = \"$rfid\"";

			

	// deduct the amount if there is enough in the system.
	if ( $dining >= $diningAmount ) {
		if ( $db->query( $query1 ) ) {
			//set a cookie to the value of the rfid
			setcookie("rfid");
			// redirect the page to the index for the next order
			header( "Location: index.php" );
		}
	}
	// redirect to the error page.
	else
		header( "Location: noMoreDining.php" );
