<?php
	$rfid = $_GET[ 'rfid' ];
	
	$db = new mysqli ('localhost', 'root', 'checkout', 'meal_plan');

	$query = "SELECT first_name, last_name FROM user WHERE rfid = $rfid";

	if ($result = $db->query($query)) {

		$finfo = $result->fetch_array();
		
		$firstName = $finfo["first_name"];
		$lastName = $finfo["last_name"];
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
      <?php echo '<h1>Student Name: ' . $firstName . ' ' . $lastName . '</h1>' ?>
    </div>
    
    <div>
    	<a href="usepunch.php?rfid=<?php echo $rfid ?>" class="button">
        	<button type="button" style="border: 0; background: transparent;
		position:relative; right: 100px;">
          		<img src="img/Punch.gif" width="400" height="100" alt="submit" />
        	</button>
      	</a>

	<a href="doublePunch.php?rfid=<?php echo $rfid ?>" class="button">
        	<button type="button" style=" border: 0; background: transparent;
				position:relative; left:350px; bottom:110px;">
				<img src="img/Dbl-Punch.gif" width="400" height="100" alt="submit" />
			</button>
       </a>

	<a href = "main.php?rfid=<?php echo $rfid ?>" class ="button">
		<button type= "button" style = "border: 0; background: transparent;
			position:relative; top:100px; right:825px; ">
			<img src="img/Go-Back.gif" width="200" height="50" alt="submit" />
		</button>
	</a>
    </div>
    
</body>

</html>
