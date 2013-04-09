<?php
	//pull the information from the url
	$rfid = $_GET[ 'rfid' ];
	
	$db = new mysqli ('localhost', 'root', 'root', 'meal_plan');

	$query = "SELECT * FROM user WHERE rfid = $rfid";

	if ($result = $db->query($query)) {

		$finfo = $result->fetch_array();
		
		$firstName = $finfo["first_name"];
		$lastName = $finfo["last_name"];
		$picture = $finfo["picture_location"];
		$punches = $finfo["punches"];
		$dining = $finfo["dining"];
		$flex = $finfo["flex"];
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
  	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script>
		$(document).ready(function() {
			$("#slidedown1").hide();
			$("#button1").hide();
			$("#slidedowndining").hide();
			$("#slidedownflex").hide();
			$("#slidedownbalance").hide();
			
			
			$(window).load(function() {
				
				$("#punch").click(function() {
		        	$("#slidedown1").slideToggle(400);
				});
		
				$("#dining").click(function() {
					$("#slidedowndining").slideToggle(400);
				});
				
				$("#flex").click(function() {
					$("#slidedownflex").slideToggle(400);
				});
				$("#balance").click(function() {
					$("#slidedownbalance").slideToggle(400);
				});
			});
		});

	</script>
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
        <button id = "punch" type="button" style="border: 0; background: transparent;">
          <img src="img/Punch.gif" width="600" alt="punch" />
		</button>


		<div id="slidedown1">
			<div class = "grid_7_left">
				<a class="hidden_punch_button" href="usepunch.php?rfid= <?php echo $rfid ?>"></a>
			</div>
			<div class = "grid_7_right">
				<a class="hidden_double_button" href="usepunch.php?rfid= <?php echo $rfid ?>"></a>
			</div>
		</div>		


        <button id = "dining" type="button" style="border: 0; background: transparent;">
        	<img src="img/Dining.gif" width="600" alt="submit" />
        </button>
		<div id="slidedowndining">
			<font size = "6">
			<form action="usedining.php" method="post">
			<input type = "hidden" name = "rfid" id = "rfid" value = "<?php echo $rfid ?>">
			Amount: <input type="text" name="amount" id = "amount"><br><br>
			
		        <input type="image" src="img/Submit.gif" value="Submit" name = "submit"
		 			height="75px" weight="50px";>
			</form>
			</font>
		</div>

        <button id="flex" type="button" style="border: 0; background: transparent;">
          <img src="img/Flex.gif" width="600" alt="submit" />
        </button>
		<div id="slidedownflex">
			<font size = "6">
			<form action="useflex.php" method="post">
			<input type = "hidden" name = "rfid" id = "rfid" value = "<?php echo $rfid ?>">
			Amount: <input type="text" name="amount" id = "amount"><br><br>			
		        <input type="image" src="img/Submit.gif" value="Submit" name = "submit"
		 			height="75px" weight="50px";>
			</form>
			</font>
		</div>
		
		<div class="grid_6">
			<div class="grid_6_left">
        		<button id = "balance" type="button" style="border: 0; background: transparent; float: left;">
          			<img src="img/Balance.gif" width="275" alt="submit" />
       			</button>
			</div>
			<div class="grid_6_right">
				<a href="index.php">
					<button type = "button" style="border: 0; background: transparent; float: right; float:top;">
						<img src="img/Quit.gif" width="275" alt="submit" />
      				</a>
			</div>
		</div>
		
		<div id="slidedownbalance">
			<?php echo '<h2>Punch Balance = ' . $punches ?>
			<?php echo ' Dining Balance = $' . $dining ?>
			<?php echo ' Flex Balance = $' . $flex . '</h2>' ?>		
		</div>
	</div>
	
</body>
</html>
  
