<?php
session_start();
if (!$_SESSION['user_level'])
{
 header("Location: login.php");
 die();
}
elseif ($_SESSION['user_level']=="M")
{
 header("Location: home.php");
 die();
}
$search_attrib=$_POST['contact_id'];
$search_operator=$_POST['search_operator'];
$search_value=$_POST['search_value'];

$menu_function="Delete records from the database";
include("header.php"); 

echo "<div style='height:400px;padding-top:10px;'>";

if (($_POST['contact_id']=='') && !($_POST['delete_record']=='true'))
{
echo "<form action='delete.php' method='post' name='delete_select_form'>
<table summary=''>
 <tr>
  <td>Contact ID</td>
  <td><input type='text' name='contact_id' />[required]</td>
 </tr>
 <tr>
  <td colspan='2'><input type='submit' value='Retrieve Record' /></td>
 </tr>
</table>
</form>";
}
elseif (!($_POST['contact_id']==''))
{
if (!($_SESSION['email']=='' || $_SESSION['user_level']==''))
{
$dbhost = 'localhost';
$dbuser = '';
$dbpass = '';
$dbname = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die
        ('Error connecting to mysql');
mysql_select_db($dbname, $conn);

$sql="SELECT * FROM contacts WHERE contact_id=" . $_POST[contact_id];

$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$_SESSION['delete_contact_id']=$row['contact_id'];
mysql_close($conn);
}

echo "<form action='delete.php' method='post' name='delete_form'>
<table summary=''>
 <tr>
  <td>Contact ID</td>
  <td><input type='text' name='contact_id' value='" . $row[contact_id] . "' disabled='disabled' /></td>
 </tr>
 <tr>
  <td>First Name</td>
  <td><input type='text' name='first_name' value='" . $row[first_name] . "' />[required]</td>
 </tr>
 <tr>
  <td>Last Name</td>
  <td><input type='text' name='last_name' value='" . $row[last_name] . "' />[required]</td>
 </tr>
 <tr>
  <td>Password</td>
  <td><input type='text' name='password' value='" . $row[password] . "' /></td>
 </tr>
 <tr>
  <td>User Level</td>
 <td><input type='text' name='user_level' value='" . $row[user_level] . "' /></td>
  </tr>
 <tr>
  <td>Street</td>
  <td><input type='text' name='street' value='" . $row[street] . "' /></td>
 </tr>
 <tr>
  <td>City</td>
  <td><input type='text' name='city' value='" . $row[city] . "' /></td>
 </tr>
 <tr>
  <td>State</td>
 <td><input type='text' name='state_name' value='" . $row[state_name] . "' /></td>
 </tr>
 <tr>
  <td>Zip Code</td>
  <td><input type='text' name='zipcode' value='" . $row[zipcode] . "' /></td>
 </tr>
 <tr>
  <td>Phone</td>
  <td><input type='text' name='phone' value='" . $row[phone] . "' /></td>
 </tr>
 <tr>
  <td>Email</td>
  <td><input type='text' name='email' value='" . $row[email] . "' /></td>
 </tr>
 <tr>
  <td>Institution</td>
  <td><input type='text' name='institution' value='" . $row[institution] . "' /></td>
 </tr>
 <tr>
  <td>District</td>
  <td><input type='text' name='district' value='" . $row[district] . "' /></td>
 </tr>
 <tr>
  <td>Last Verified</td>
  <td><input type='text' name='last_verified' value='" . $row[last_verified] . "' /></td>
 </tr>
 <tr>
  <td colspan='2'>
  <input type='hidden' name='delete_record' value='true' />
  <input type='submit' value='Delete Record' /></td>
 </tr>
</table>
</form>";
}
elseif ($_POST['delete_record']=='true')
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'rcmne';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die
        ('Error connecting to mysql');
mysql_select_db($dbname, $conn);
$sql="DELETE FROM contacts WHERE contact_id=" . $_SESSION['delete_contact_id'];
mysql_query($sql);
if (!mysql_query($sql,$conn))
  {
  die('Error:' . mysql_error());
  }
echo "Record $contact_id was deleted";

mysql_close($conn);
$_SESSION['delete_contact_id']='';
}

?>

</div>
<?php
include("footer.php"); 
?>

