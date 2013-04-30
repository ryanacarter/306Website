<?php
	// make sure that the cookie is set.
	if($rfid = $_COOKIE['rfid'])
	{
		// create a connection to the database
		$db = new mysqli ('localhost', 'root', 'checkout', 'meal_plan');

		// the query statement
		$query = "SELECT first_name, last_name, dining FROM user WHERE rfid = \"$rfid\"";

		// run the statement
		if ($result = $db->query($query)) {
			
			// create an array of the result
			$finfo = $result->fetch_array();
		
			// set variables with the values that are in the array
			$firstName = $finfo["first_name"];
			$lastName = $finfo["last_name"];
			$dining = $finfo["dining"];
		}
	}
?>

<!DOCTYPE HTML>
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
		<!-- Echo out the error statement on the page-->
	    	<?php echo '<center><h1>' . $firstName . ' ' . $lastName . ' DOES NOT HAVE ENOUGH DINING!!!' . '</h1></center>' ?>

	      	<?php echo '<center><h2>' . $firstName . ' ' . $lastName . '\'s Dining Balance = $' . $dining . '</h2></center>' ?>
	    	<br><br><br><br><br><br><br>
	    </div>

        <a href="main.php" class="button" id="balance">
	      <button type="button" style="border: 0; background: transparent; 
				position:relative; right:200px;">
			<img src="img/Go-Back.gif" width="350" height="75px" alt="submit" /></button>
	    </a>


 
</body>
</html>
  
