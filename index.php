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
		$("#scan").hide();
			
			
		$(window).load(function() {
				
			$("#scanButton").click(function() {
		        	$("#scan").slideToggle(400);
			});
		});
	});
		
</script>
</head>

<body>
    <div class="container clearfix">
		<div class="grid_12">
        <img  class="banner" src="img/Banner3.gif" alt="DukeServe">
    </div>
    <div class="grid_9">
      <a href="getRFID.php">
	<button id = "scanButton" type = "button" style="border: 0; background: transparent; float: center; float:top;"> 
		<img src="img/Quit.gif" width="275" alt="submit" />
	</button>
      </a>

    <div id = "scan">
	<h1>Waiting. . .</h1>
    </div>
</div>
</body>
</html>
  

