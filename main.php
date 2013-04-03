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
	<div class="container clearfix">
		<div class="grid_12">
        <img  class="banner" src="img/Banner3.gif" alt="DukeServe">
    </div>
  
    <div class="grid_12">
      <?php echo '<h1>Student Name: ' . $firstName . ' ' . $lastName . '</h1>' ?>
      	<img border="1" src="<?php echo $picture ?>" alt="<?php echo $firstName . ' ' . $lastName?> " 		height="230px" width="175px" style=" float:right; border-color:#000000;">
    </div>
    <div>
       <a href="punch.php?rfid=<?php echo $rfid ?>" class="button">
        <button type="button" style="border: 0; background: transparent;
	position: relative; bottom:200px;">
          <img src="img/Punch.gif" width="600" alt="submit" />
        </button>
      </a>

      <a href="dining.php?rfid=<?php echo $rfid ?>" class="button">
        <button type="button" style="border: 0; background: transparent;
	position: relative; bottom:200px;">
        <img src="img/Dining.gif" width="600" alt="submit" />
        </button>
      </a>

      <a href="flex.php?rfid=<?php echo $rfid ?>" class="button">
        <button type="button" style="border: 0; background: transparent;
	position: relative; bottom:200px;">
          <img src="img/Flex.gif" width="600" alt="submit" />
        </button>
      </a>
    </div>

    <div class="grid_3" id="balance">
      <a href="balance.php?rfid=<?php echo $rfid ?>" class="button" id="balance">
        <button type="button" style="border: 0; background: transparent;
	position: relative; bottom:200px;">
          <img src="img/Balance.gif" width="275" alt="submit" />
        </button>
      </a>
    </div>
    <div class="grid_3 omega">
      <a href="index.php" class="button" id="balance">
        <button type="button" style="background-color:#5C005C;color:#FFFFFF;
	position: relative; width:275px; height:85px; bottom:200px;">
          QUIT!!!
        </button>
      </a>
    </div>
    <!--------<div class="grid_4">
      <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
      </p>
    </div>

    <div class="grid_8 omega">
      <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
      </p>
    </div>-->



	</div>
</body>
</html>
  
