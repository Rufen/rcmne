<?php

$menu_function="View all database records";
include("../rcmne/header.php"); 
?>
<style type="text/css">
<!--
#tblview td, #tblview th {border:solid gray 1px;}
-->
</style>
<div style="height:400px;padding-top:10px;">
<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'rcmne';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die
        ('Error connecting to mysql');
mysql_select_db($dbname, $conn);
$result = mysql_query("SELECT * FROM contacts ORDER BY contact_id");
echo "<table id='tblview' style='border-collapse:collapse;border:solid black 2px;background-color:white;'><tr>
<th>contact_id</th>
<th>first_name</th>
<th>last_name</th>
<th>user_level</th>
<th>street</th>
<th>city</th>
<th>state_name</th>
<th>zipcode</th>
<th>phone</th>
<th>email</th>
<th>institution</th>
<th>district</th>
<th>last_verified</th>
</tr>";
ini_set('display_errors', 0);
while($row = mysql_fetch_array($result))
  {
  echo "<tr onmouseover='this.style.backgroundColor=\"#ffffee\";' onmouseout='this.style.backgroundColor=\"white\";'>";
  echo "<td>" . $row['contact_id'] . "&nbsp;</td>";
  echo "<td>" . $row['first_name'] . "&nbsp;</td>";
  echo "<td>" . $row['last_name'] . "&nbsp;</td>";
  echo "<td>" . $row['user_level'] . "&nbsp;</td>";
  echo "<td>" . $row['street'] . "&nbsp;</td>";
  echo "<td>" . $row['city'] . "&nbsp;</td>";
  echo "<td>" . $row['state_name'] . "&nbsp;</td>";
  echo "<td>" . $row['zipcode'] . "&nbsp;</td>";
  echo "<td>" . $row['phone'] . "&nbsp;</td>";
  echo "<td>" . $row['email'] . "&nbsp;</td>";
  echo "<td>" . $row['institution'] . "&nbsp;</td>";
  echo "<td>" . $row['district'] . "&nbsp;</td>";
  echo "<td>" . $row['last_verified'] . "&nbsp;</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($conn);

?>

</div>
<?php
include("../rcmne/footer.php"); 
?>

