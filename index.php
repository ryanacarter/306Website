<?php

	setcookie("rfid");

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

	<?php echo '<h1>' . $test . '</h1>' ?>
    </div>

</body>
</html>

<?php

//function
	// create a variable that sets the listen to listen on port 6002
	//$sock = socket_create( AF_INET, SOCK_RAW, TCP);
	
	// Need to chache
	//$sourceip['arduino'] = '192.168.3.120';
	
	//$test = "it did not work =(";
	
	// Bind the socket
	//socket_bind($sock, $sourceip['arduino'], 6002);
	
	
	//create the waiter
	//if(socket_listen($sock, $sourceip['arduino'], 6002))
	//{
	//	$test = "it worked!!!!";
	//}
	
	
	



?>
  