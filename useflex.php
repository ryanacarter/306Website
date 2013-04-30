<?php

	// we have values, let's try to insert new student into the db
	// connect
	$db = new mysqli( 'localhost', 'root', 'checkout', 'meal_plan' );
	
	// extract our values from $_POST
	extract( $_POST );

	// SQL statement
	$query = "SELECT flex FROM user WHERE rfid = \"$rfid\"";

	// run the statement
	if ($result = $db->query($query)) {

		// place the value into and array, then place them into a varriable
		$finfo = $result->fetch_array();
	
		$flex = $finfo["flex"];
	}

	// second statement is use to deduct the dining
	$query1 = "UPDATE user SET flex = flex - $flexAmount WHERE rfid = \"$rfid\"";

			

	// make sure there is enough flex
	if ( $flex >= $flexAmount ) {	
		if ( $db->query( $query1 ) ) {
			//set a cookie to null
			setcookie("rfid");
			//redirect back to the index page
			header( "Location: index.php" );
		}
	}
	// if they do not have enough send the user to the error page.
	else
		header( "Location: noMoreFlex.php" );
