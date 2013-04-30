<?php
	// pull the information from the url, if it does not pull the information, skip
	// to the else statement and do not crash
	if($rfid = $_COOKIE['rfid'])
	{
		// Create the database connection
		$db = new mysqli ('localhost', 'root', 'checkout', 'meal_plan');
		
		// query statement to pull of the the customers informatoin
		$query = "SELECT * FROM user WHERE rfid = \"$rfid\"";

		// run the result and make sure set varriables that hold the information
		if ($result = $db->query($query)) {

			$finfo = $result->fetch_array();
		
			$firstName = $finfo["first_name"];
			$lastName = $finfo["last_name"];
			$picture = $finfo["picture_location"];
			$punches = $finfo["punches"];
			$dining = $finfo["dining"];
			$flex = $finfo["flex"];
		}
	
	}
	else
	{
		// show the page and fill in the information with no connection
		$firstName = "No Connection";
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

	<!-- 
		This script is used to control form validation and slideToggle functions
	-->
	<script>
		// used to validate the information added to the dinning field
		function validateDiningForm()
		{
			var x=document.forms["dining"]["diningAmount"].value;

			if (x==null || x=="")
  			{
  				alert("\"Amount\" must have a value");
  				return false;
  			}
			
		}

		// used to validate the information added to the flex field
		function validateFlexForm()
		{
			var x=document.forms["flex"]["flexAmount"].value;

			if (x==null || x=="")
  			{
  				alert("\"Amount\" must have a value");
  				return false;
  			}
			
		}
		
		// used to hid all of the divs for slidedowns on page load
		$(document).ready(function() {
			$("#slidedown1").hide();
			$("#button1").hide();
			$("#slidedowndining").hide();
			$("#slidedownflex").hide();
			$("#slidedownbalance").hide();
			
			// used to show the divs on button press
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
	<!--
		div container clearfix is used to wrap the whole page in a div. This allows for 
	    easy modality and placement of other objects as well as giving a well defined
	    boundary to the programmers writing out the code. 
	-->
	<div class="header">
		<div class="grid_12">
        		<img  class="banner" src="img/Banner3.gif" alt="DukeServe">
		</div>
   	</div>
  
	<!-- Grid 11 is used to hold the customers name and picture at the top of the page -->
    <div class="grid_11">
		<div class="grid_10">
      			<?php echo 'Student Name: ' . $firstName . ' ' . $lastName ?>
		</div>
      	
		<!-- dynamically sets the picture based on the location from the database.-->
		<img border="1" src="<?php echo $picture ?>" alt="<?php echo $firstName .
		' ' . $lastName ?>" height="200px" width="150px" 
		style=" float:right; border-color:#000000;">

    </div>


	<!-- Grid 9 is used to hold of the buttons-->
    <div class="grid_9">
        <button id = "punch" type="button" style="border: 0; background: transparent;">
          <img src="img/Punch.gif" width="600" alt="punch" />
		</button>

		<!-- 
			slidedown1 is the hidden div that holds the punch and double punch buttons on the
			on the page. It is displayed when the button in pressed.
		-->
		<div id="slidedown1">
			<div class = "grid_7_left">
				<a class="hidden_punch_button" href="usepunch.php"></a>
			</div>
			<div class = "grid_7_right">
				<a class="hidden_double_button" href="doublePunch.php"></a>
			</div>
		</div>		

		<!-- This button is the button the is pressed to show the form to enter dinning amount-->
        <button id = "dining" type="button" style="border: 0; background: transparent;">
        	<img src="img/Dining.gif" width="600" alt="submit" />
        </button>

		<!-- 
			slidedowndining is the hidden div that be shown on button click. It holds the form that allows the
			user to ender a dinning amount.
		-->
		<div id="slidedowndining">
			<font size = "6">
			<form name="dining" action="usedining.php" method="post" onsubmit="return validateDiningForm()" >
			<input type = "hidden" name = "rfid" id = "rfid" value = "<?php echo $rfid ?>">
			Amount: <input type="text" name="diningAmount" id = "amount"><br><br>
			
		        <input type="image" src="img/Submit.gif" value="Submit" name = "submit"
		 			height="75px" weight="50px";>
			</form>
			</font>
		</div>

		<!-- Button the is used to show the slidedownflex hidden div -->
        <button id="flex" type="button" style="border: 0; background: transparent;">
          <img src="img/Flex.gif" width="600" alt="submit" />
        </button>
		<!-- 
			slidedownflex is a hidden div that is shown and allows the user to enter the amount of flex
			that they wish to charge the customer.
		-->
		<div id="slidedownflex">
			<font size = "6">
			<form name="flex" action="useflex.php" method="post" onsubmit="return validateFlexForm()" >
			<input type = "hidden" name = "rfid" id = "rfid" value = "<?php echo $rfid ?>">
			Amount: <input type="text" name="flexAmount" id = "amount"><br><br>			
		        <input type="image" src="img/Submit.gif" value="Submit" name = "submit"
		 			height="75px" weight="50px";>
			</form>
			</font>
		</div>
		
		<!-- 
			grid_6 is the button div on the page. It holds the divs for both of the side by side(balance and quit)
			buttons the are at the button of the div.
		-->
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
					</button>
      				</a>
			</div>
		</div>
		
		<!-- This is a hidden div the will slide down to show the balance of the customers account.-->
		<div id="slidedownbalance">
			<?php echo '<h2>Punch Balance = ' . $punches ?>
			<?php echo ' Dining Balance = $' . $dining ?>
			<?php echo ' Flex Balance = $' . $flex . '</h2>' ?>		
		</div>
	</div>
	
</body>
</html>
  
