<?php
$eid=$_GET["eid"];

$db = new mysqli('localhost', 'root', 'checkout', 'meal_plan');
if (!$db)
  {
  die('Could not connect: ' . mysql_error());
  }
 
$query="SELECT * FROM user WHERE e_id = $eid";

if ($result = $db->query($query)) {

        $finfo = $result->fetch_array();
       
        $firstName = $finfo["first_name"];
        $lastName = $finfo["last_name"];
       
    }
 
 
echo "<table border='1'>
<tr>
<th>e_id</th>
<th>FirstName</th>
<th>LastName</th>
<th>Punches</th>
<th>Dining</th>
<th>Flex</th>
</tr>";
 
 
echo "<tr>";
echo "<td>" . $finfo["e_id"] . "</td>";
echo "<td>" . $finfo["first_name"] . "</td>";
echo "<td>" . $finfo['last_name'] . "</td>";
echo "<td>" . $finfo['punches'] . "</td>";
echo "<td>" . $finfo['dining'] . "</td>";
echo "<td>" . $finfo['flex'] . "</td>";
echo "</tr>" ;
 
echo "</table>";


 
$result=array();
while ($result = $db->query($query)) {
        $result[]=$finfo;
}

echo json_encode($result);
 
mysql_close($con);
?>
