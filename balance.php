<?php
	$rfid = $_GET[ 'rfid' ];	

	// we have values, let's try to insert new student into the db
	// connect
	$db = new mysqli( 'localhost', 'root', 'checkout', 'meal_plan' );

	$query = "SELECT * FROM user WHERE rfid = $rfid";

	if ($result = $db->query($query)) {

		$finfo = $result->fetch_array();
		
		$firstName = $finfo["first_name"];
		$lastName = $finfo["last_name"];
		$punches = $finfo["punches"];
		$dining = $finfo["dining"];
		$flex = $finfo["flex"];
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
	<?php echo '<font size = "7">Punch Balance = ' . $punches . '</h2></center><br>' ?>
	<?php echo 'Dining Balance = $' . $dining . '</h2></center><br>' ?>
	<?php echo 'Dining Balance = $' . $flex . '</h2></center></font><br>' ?>
    </div>
	<br><br><br><br><br><br>
    <a href="main.php?rfid=<?php echo $rfid ?>" class="button" id="balance">
      <button type="button" style=" position:relative; width: 360px; height:75px; right:200px; ">Go Back</button>
    </a>
    
</body>

</html>
