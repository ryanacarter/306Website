<?php


setcookie("rfid");

$db = new mysqli ('localhost', 'root', 'checkout', 'meal_plan');

$query = "SELECT * FROM arduinoConnection";

$quitLoop = false;
$counter = 0;
$rfid = "";

// Delete and re-create the temp. table
$db->query("TRUNCATE TABLE arduinoConnection;");

// The Users has 10 seconds to scan in the rfid tag
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
		
} // end loop

// Compare the $rfid to an empty string
$cmp = strcmp($rfid."", "");

// if $rfid has been set, move on, if not go back to the
// index page and throw an error.
if ( $cmp < 1 )
	header("Location: index.php?error=1");
else
	header("Location: main.php");

?>
