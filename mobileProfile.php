<?php
	//pull the information from the url
	
	$eid = $_POST["eid"];
	
	if($eid != null)
	{
	
		$db = new mysqli ('localhost', 'root', 'checkout', 'meal_plan');
		
		$query = "SELECT * FROM user WHERE e_id = $eid";

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
		$firstName = "No Connection";
	}

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>DukeServe</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
	<link rel="stylesheet" type="text/css" href="css/mobileprofile.css" />
</head>
<body>
    <div class="container">
    
    	<div id="banner">
    		<img src="img/Head.gif" width="55" class="head"/>
    		<h1 class="title">DukeServe</h1>
    	</div>
    	
    	<div id="username">
		<h1 class="username"><?php echo 'Name: ' . $firstName . ' ' . $lastName?></h1>
      		<img border="1" src="<?php echo $picture ?>" alt="<?php echo $firstName .
			' ' . $lastName?> "height="320px" width="301px" 
			style=" float:center; border-color:#000000;">
	</div>
    	

    	<div id="content">
	    	<?php echo '<h2>Punch Balance = ' . $punches ?></br>
		<?php echo ' Dining Balance = $' . $dining ?></br>
		<?php echo ' Flex Balance = $' . $flex . '</h2>' ?></br>
    	</div>
    	
    	</div id="footer">
    		<a href="mobileindex.html">	
    			<img src="img/Back.gif" width="50" class="back"/>
    		</a>
    	</div>
    	
    </div>

</body>
</html>
