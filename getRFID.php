<?php

setcookie("rfid");

$db = new mysqli ('localhost', 'root', 'checkout', 'meal_plan');

$query = "SELECT * FROM arduinoConnection";

$quitLoop = false;
$counter = 0;
$rfid = "";

$db->query("TRUNCATE TABLE arduinoConnection;");


while($counter < 10 && !$quitLoop == true)
{
	if( $result = $db->query($query) )
	{
		$finfo = $result->fetch_array();

		$rfid = $finfo["rfid"];

		$cmp = strcmp($rfid."", "");

		if($cmp > 0)
		{
			$quitLoop = true;
			setcookie("rfid", $rfid."");
		}
			
	}
		
	sleep(1);
	$counter += 1;
		
}

if ($cmp = strcmp($rfid."", "") );

if ( $cmp < 1 )
{

	header("Location: index.php?error=1");
}
else
{
	header("Location: main.php");
}

?>
