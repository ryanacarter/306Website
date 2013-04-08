<?php
	//pull the information from the url
	$rfid = $_GET[ 'rfid' ];
	
	$db = new mysqli ('localhost', 'root', 'checkout', 'meal_plan');

	$query = "SELECT first_name, last_name, picture_location FROM user WHERE rfid = $rfid";

	if ($result = $db->query($query)) {

		$finfo = $result->fetch_array();
		
		$firstName = $finfo["first_name"];
		$lastName = $finfo["last_name"];
		$picture = $finfo["picture_location"];
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
	<div class="header">
		<div class="grid_12">
        	<img  class="banner" src="img/Banner3.gif" alt="DukeServe">
		</div>
    </div>
  
    <div class="grid_11">
		<div class="grid_10">
      		<?php echo 'Student Name: ' . $firstName . ' ' . $lastName ?>
		</div>
      		<img border="1" src="<?php echo $picture ?>" alt="<?php echo $firstName .
			' ' . $lastName?> "height="200px" width="150px" 
			style=" float:right; border-color:#000000;">
		</div>
    </div>
    <div class="grid_9">
       <a href="punch.php?rfid=<?php echo $rfid ?>" class="button">
        <button type="button" style="border: 0; background: transparent;">
          <img src="img/Punch.gif" width="600" alt="submit" />
        </button>
      </a>

      <a href="dining.php?rfid=<?php echo $rfid ?>" class="button">
        <button type="button" style="border: 0; background: transparent;">
        <img src="img/Dining.gif" width="600" alt="submit" />
        </button>
      </a>

      <a href="flex.php?rfid=<?php echo $rfid ?>" class="button">
        <button type="button" style="border: 0; background: transparent;">
          <img src="img/Flex.gif" width="600" alt="submit" />
        </button>
      </a>
    </div>

    <div class="grid_8">
		<div class="grid_7_left">
      		<a href="balance.php?rfid=<?php echo $rfid ?>" class="button" id="balance">
        		<button type="button" style="border: 0; background: transparent; float: left;">
          			<img src="img/Balance.gif" width="275" alt="submit" />
        		</button>
      		</a>
		</div>
		<div class="grid_7_right">
      		<a href="index.php" class="button" id="balance">
        		<button type="button" style="border: 0; background: transparent; float: right;">
					<img src="img/Quit.gif" width="275" alt="submit" />
        		</button>
      		</a>
		</div>
    </div>
	
	<div class="footer"><br></div>
	
</body>
</html>
  
