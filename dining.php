<?php

	// we have values, let's try to insert new student into the db
	// connect
	$db = new mysqli( 'localhost', 'root', 'checkout', 'meal_plan' );

	// check to see if we're coming to this page after having
	// submitted the form
	if ( isset( $_POST[ 'amount' ] ) ) {
		
		// extract our values from $_POST
		extract( $_POST );

		$query = "SELECT dining FROM user WHERE rfid = $rfid";

		if ($result = $db->query($query)) {

			$finfo = $result->fetch_array();
		
			$dining = $finfo["dining"];
		}

		$query1 = "UPDATE user SET dining = dining - $amount WHERE rfid = $rfid";

				

		// deduct the amount
		if ( $dining > $amount ) {	
			if ( $db->query( $query1 ) ) {
				header( "Location: index.php" );
			}
		}
		else
			header( "Location: noMoreDining.php?rfid=" . $rfid );
	}
	else {

		$rfid = $_GET[ 'rfid' ];


		$query = "SELECT first_name, last_name FROM user WHERE rfid = $rfid";

		if ($result = $db->query($query)) {

			$finfo = $result->fetch_array();
		
			$firstName = $finfo["first_name"];
			$lastName = $finfo["last_name"];
		}
	}

	
	
	
?>

<!doctype HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>DukeServe Cashier</title>
  <link rel="stylesheet" href="css/normalize.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
</head>
<body>
	<div class="container clearfix">
		<div class="grid_12">
        <img  class="banner" src="img/Banner3.gif" alt="DukeServe">
    </div>
  
    <div class="grid_12">
      <?php echo '<h1>Student Name: ' . $firstName . ' ' . $lastName . '</h1>' ?>
    </div>
    
    <div>
	<font size = "6">
	<form action="<?php echo $_SERVER[ 'PHP_SELF' ]; ?>" method="post">
	<input type = "hidden" name = "rfid" id = "rfid" value = "<?php echo $rfid ?>"><br>
	Dining Amount: <input type="text" name="amount" id = "amount"><br><br>
        <input type="image" src="img/Submit.gif" value="Submit" name = "submit"
 			height="75px" weight="50px";>
	</form>
	</font>
    </div>
    <a href="main.php?rfid=<?php echo $rfid ?>" class="button" id="balance">
      <button type="button" style="border: 0; background: transparent; 
			position:relative; left: 200px; bottom:85px;">
		<img src="img/Go-Back.gif" width="350" height="75px" alt="submit" /></button>
    </a>    
</body>

</html>
