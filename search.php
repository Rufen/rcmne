<?php
$search_attrib=$_POST['search_attrib'];
$search_operator=$_POST['search_operator'];
$search_value=$_POST['search_value'];
$search_order=$_POST['search_order'];
$search_direction=$_POST['search_direction'];
$menu_function="Search the database";
include("../rcmne/header.php");
echo "<style type='text/css'>
#tblview td, #tblview th {border:solid gray 1px;}
</style>
<script type='text/javascript'>
function checkState()
{
	if (document.getElementById('search_attrib').options[document.getElementById('search_attrib').selectedIndex].value=='state_name')
	{
		document.getElementById('search_value').style.display='none';
		document.getElementById('state_name').style.display='inline';
	}
	else 
	{
		document.getElementById('search_value').style.display='inline';
		document.getElementById('state_name').style.display='none';
	}
	
}	
</script>
<div style='height:400px;padding-top:10px;'>
 <form action='search.php' method='post' name='search_form'>
   Search for: 
   <select id='search_attrib' name='search_attrib' onChange='checkState();'>
    <option value='contact_id' selected='selected'>contact_id</option>
    <option value='first_name'>first_name</option>
    <option value='last_name'>last_name</option>
    <option value='user_level'>user_level</option>
    <option value='street'>street</option>
    <option value='city'>city</option>
    <option value='state_name'>state_name</option>
    <option value='zipcode'>zipcode</option>
    <option value='phone'>phone</option>
    <option value='email'>email</option>
    <option value='institution'>institution</option>
    <option value='last_verified'>last_verified</option>
   </select>   
   <select name='search_operator'>
    <option value='=' selected='selected'>equals</option>
    <option value='!='>does not equal</option>
   </select>
   <input type='text' id='search_value' name='search_value' style='display:inline;' />
   
   <select id='state_name' name='state_name' style='display:none;'>
    <optgroup style='background-color:green;color:white;' label='New England'>---New England---</optgroup>
    <option value='CT'>CONNECTICUT</option>
    <option value='ME' selected='selected'>MAINE</option>
    <option value='MA'>MASSACHUSETTS</option>
    <option value='NH'>NEW HAMPSHIRE</option>
    <option value='RI'>RHODE ISLAND</option>
    <option value='VT'>VERMONT</option>
    <optgroup style='background-color:green;color:white;' label='Other States'>---Other States---</optgroup>
    <option value='AL'>ALABAMA</option>
    <option value='AK'>ALASKA</option>
    <option value='AS'>AMERICAN SAMOA</option>
    <option value='AZ'>ARIZONA</option>
    <option value='AR'>ARKANSAS</option>
    <option value='CA'>CALIFORNIA</option>
    <option value='CO'>COLORADO</option>
    <option value='DE'>DELAWARE</option>
    <option value='DC'>DISTRICT OF COLUMBIA</option>
    <option value='FM'>FEDERATED STATES OF MICRONESIA</option>
    <option value='FL'>FLORIDA</option>
    <option value='GA'>GEORGIA</option>
    <option value='GU'>GUAM</option>
    <option value='HI'>HAWAII</option>
    <option value='ID'>IDAHO</option>
    <option value='IL'>ILLINOIS</option>
    <option value='IN'>INDIANA</option>
    <option value='IA'>IOWA</option>
    <option value='KS'>KANSAS</option>
    <option value='KY'>KENTUCKY</option>
    <option value='LA'>LOUISIANA</option>
    <option value='MH'>MARSHALL ISLANDS</option>
    <option value='MD'>MARYLAND</option>
    <option value='MI'>MICHIGAN</option>
    <option value='MN'>MINNESOTA</option>
    <option value='MS'>MISSISSIPPI</option>
    <option value='MO'>MISSOURI</option>
    <option value='MT'>MONTANA</option>
    <option value='NE'>NEBRASKA</option>
    <option value='NV'>NEVADA</option>
    <option value='NJ'>NEW JERSEY</option>
    <option value='NM'>NEW MEXICO</option>
    <option value='NY'>NEW YORK</option>
    <option value='NC'>NORTH CAROLINA</option>
    <option value='ND'>NORTH DAKOTA</option>
    <option value='MP'>NORTHERN MARIANA ISLANDS</option>
    <option value='OH'>OHIO</option>
    <option value='OK'>OKLAHOMA</option>
    <option value='OR'>OREGON</option>
    <option value='PW'>PALAU</option>
    <option value='PA'>PENNSYLVANIA</option>
    <option value='PR'>PUERTO RICO</option>
    <option value='SC'>SOUTH CAROLINA</option>
    <option value='SD'>SOUTH DAKOTA</option>
    <option value='TN'>TENNESSEE</option>
    <option value='TX'>TEXAS</option>
    <option value='UT'>UTAH</option>
    <option value='VI'>VIRGIN ISLANDS</option>
    <option value='VA'>VIRGINIA</option>
    <option value='WA'>WASHINGTON</option>
    <option value='WV'>WEST VIRGINIA</option>
    <option value='WI'>WISCONSIN</option>
    <option value='WY'>WYOMING</option>
   </select>&nbsp;&nbsp;ordered by&nbsp;

   <select name='search_order'>
    <option value='contact_id' selected='selected'>contact_id</option>
    <option value='first_name'>first_name</option>
    <option value='last_name'>last_name</option>
    <option value='user_level'>user_level</option>
    <option value='street'>street</option>
    <option value='city'>city</option>
    <option value='state_name'>state_name</option>
    <option value='zipcode'>zipcode</option>
    <option value='phone'>phone</option>
    <option value='email'>email</option>
    <option value='institution'>institution</option>
    <option value='last_verified'>last_verified</option>
   </select>&nbsp;in&nbsp;   
   <select name='search_direction'>
    <option value='ASC' selected='selected'>Ascending order</option>
    <option value='DESC'>Descending order</option>
   </select>&nbsp;&nbsp;
   <input type='submit' value='Search' />
 </form>
"; 

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'rcmne';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die
        ('Error connecting to mysql');
mysql_select_db($dbname, $conn);
if ($_POST['search_attrib']=='state_name')
{
$result = mysql_query("SELECT * FROM contacts WHERE state_name" . $search_operator . "'" . $_POST['state_name'] . "' ORDER BY " . $search_order . " " . $search_direction);
}
elseif (!$search_attrib=='')
{
$result = mysql_query("SELECT * FROM contacts WHERE " . $search_attrib . $search_operator . "'" . $search_value . "' ORDER BY " . $search_order . " " . $search_direction);
}
else
{

}
if ($result)
{
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
}
mysql_close($conn);
?>

</div>
<?php
include("../rcmne/footer.php"); 
?>

