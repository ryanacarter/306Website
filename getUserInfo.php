<?php
//$q=$_GET["q"];
$q = 107833556;

$con = mysql_connect('localhost', 'root', 'checkout', 'meal_plan');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$sql="SELECT * FROM user WHERE e_id = $q";

$result = mysql_query($con, $sql);


echo "<table border='1'>
<tr>
<th>e_id</th>
<th>FirstName</th>
<th>LastName</th>
<th>Punches</th>
<th>Dining</th>
<th>Flex</th>
</tr>";

$row = $result->fetch_assoc();
echo "<tr>";
echo "<td>" . $row["e_id"] . "</td>";
echo "<td>" . $row["first_name"] . "</td>";
echo "<td>" . $row['last_name'] . "</td>";
echo "<td>" . $row['punches'] . "</td>";
echo "<td>" . $row['dining'] . "</td>";
echo "<td>" . $row['flex'] . "</td>";
echo "</tr>";
  
echo "</table>";

mysql_close($con);
?>
