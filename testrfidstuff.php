<?php
$con=mysqli_connect("localhost","root","checkout","meal_plan");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM user");

echo "<table border='1'>
<tr>
<th>first_name</th>
<th>last_name</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['first_name'] . "</td>";
  echo "<td>" . $row['last_name'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>
