<?php

	// we have values, let's try to insert new student into the db
	// connect
	$db = new mysqli( 'localhost', 'root', 'checkout', 'meal_plan' );
	
	// extract our values from $_POST
	extract( $_POST );

	$query = "SELECT flex FROM user WHERE rfid = $rfid";

	if ($result = $db->query($query)) {

		$finfo = $result->fetch_array();
	
		$flex = $finfo["flex"];
	}

	$query1 = "UPDATE user SET flex = flex - $amount WHERE rfid = $rfid";

			

	// deduct the amount
	if ( $flex > $amount ) {	
		if ( $db->query( $query1 ) ) {
			header( "Location: index.php" );
		}
	}
	else
		header( "Location: noMoreDining.php?rfid=" . $rfid );
