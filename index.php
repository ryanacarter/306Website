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
	The Javascript below is used to handle the slide toggle function of the two buttons that
	are on the main page. There is an import in the header on the html page to load in the
	necessary commands to run the scripts
-->
<script>
	// hid all of the divs that are to show on button press.
	$(document).ready(function() {
		$("#scan").hide();
		$("#rfid").hide();
			
		// used to monitor button presses and handle the slide down function
		$(window).load(function() {
			
			// handles the sliding function
			$("#scanButton").click(function() {
				$("#scan").slideToggle(400);
			});			
			$("#enterRFID").click(function() {
				$("#rfid").slideToggle(400);
			});

		});
	});
		
</script>
</head>

<!--
	div container clearfix is used to wrap the whole page in a div. This allows for 
    easy modality and placement of other objects as well as giving a well defined
    boundary to the programmers writing out the code. 
-->
<div class="container clearfix">
	<div class="grid_12">
		<!-- This div holds the image of the banner at the top of the screen -->
    	<img  class="banner" src="img/Banner3.gif" alt="DukeServe">
	</div>
</div>
<!--
	Grid 9 is the main block in which all of the code for the buttons and slide down
	menus are going to be placed.
-->
<div class="grid_9">
	<!--
		Grid 5 is used to hold the buttons themselves. The reason for placing them
		into a div is so the centering them on the form becomes easier.
	-->
	<div class="grid_5">
		<!--
			getRDID redirects the page to a php script that waits for an RFID
			card to be scanned
		-->
  		<a href="getRFID.php">
			<button id = "scanButton" type = "button" style="border: 0; 
				background: transparent; float: center; float:top;">
				<img src="img/Quit.gif" width="275" alt="submit" />
			</button>
  		</a>
	</div> 
	<!-- scan is a hidden div that shows when the user chooses to scan an RFID -->
	<div id = "scan">
		<h1>Waiting. . .</h1>
	</div>
	<!-- This is the second button that is used to manually enter the EID -->
	<div class="grid_5">
		<button id = "enterRFID" type = "button" style="border: 0; 
			background: transparent; float: center; float:top;">
			<img src="img/Quit.gif" width="275" alt="submit" />
		</button>
	</div>
	<!-- RFID is a hidden div holding the form for manual EID input -->
	<div id = "rfid">
		<form name="setRFID" action="setCookie.rfid" method="post" >
		<input type = "hidden" name = "rfid" id = "rfid" value = "<?php echo $rfid ?>">
		EID: <input type="text" name="EID" id = "EID"><br><br>
		
	        <input type="image" src="img/Submit.gif" value="Submit" name = "submit"
	 			height="50px" weight="30px";>
		</form>
	</div>
</div>

</body>

</html>