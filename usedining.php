<?php

	// we have values, let's try to insert new student into the db
	// connect
	$db = new mysqli( 'localhost', 'root', 'checkout', 'meal_plan' );
	
	// extract our values from $_POST
	extract( $_POST );

	$query = "SELECT dining FROM user WHERE rfid = \"$rfid\"";

	if ($result = $db->query($query)) {

		$finfo = $result->fetch_array();
	
		$dining = $finfo["dining"];
	}

	$query1 = "UPDATE user SET dining = dining - $diningAmount WHERE rfid = \"$rfid\"";

			

	// deduct the amount
	if ( $dining >= $diningAmount ) {	
		if ( $db->query( $query1 ) ) {
			setcookie("rfid");
			header( "Location: index.php" );
		}
	}
	else
		header( "Location: noMoreDining.php" );
