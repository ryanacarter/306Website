<?php
	
	$rfid = $_GET[ 'rfid' ];
	setcookie("rfid", $rfid);

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
      <h1>Waiting for RFID . . .</h1>
    </div>

    <div class="grid_11">
	<a href="main.php"> main.php </a>
    </div>

</body>
</html>
  
