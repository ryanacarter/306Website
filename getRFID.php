<?php

$db = new mysqli ('localhost', 'root', 'checkout', 'meal_plan');

$query = "SELECT * FROM arduinoConnection";

$quitLoop = false;

while(!$quitLoop)
{
	if( $result = $db->query($query) )
	{
		$finfo = $result->fetch_array();

		$uid = $finfo["uid"];

		if($uid != 0)
			$db->query("DELETE FROM arduinoConnection WHERE uid = $uid");
		else
			$quitLoop = true;
	}
}

$quitLoop = false;
$counter = 15;
$rfid = "";

while(!$quitLoop)
{
	if( $result = $db->query($query) )
	{
		$finfo = $result->fetch_array();

		$rfid = $finfo["rfid"];

		$cmp = strcmp($rfid."", "");

		if($cmp > 0)
		{
			$quitLoop = true;
			setcookie("rfid", $rfid);
		}
			
	}
	
	if (!quitLoop )
	{
		if ($counter < 0)
			$quitLoop = true;
	}
		
	sleep(.5);
	$counter = $counter - 1;
		
}

if ($cmp = strcmp($_COOKIE['rfid']."", "") );

echo $cmp;

if ( $cmp > 0 )
{
	header("Location: index.php");
}
else
{
	header("Location: main.php");
}

?>
