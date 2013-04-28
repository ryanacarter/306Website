<?php
	if($rfid = $_COOKIE['rfid'])
	{
		
		$db = new mysqli ('localhost', 'root', 'checkout', 'meal_plan');

		$query = "SELECT first_name, last_name, dining FROM user WHERE rfid = \"$rfid\"";

		if ($result = $db->query($query)) {

			$finfo = $result->fetch_array();
		
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
  
