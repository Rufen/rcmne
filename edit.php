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

$menu_function="Edit record from the database";
include("header.php"); 

echo "<div style='height:400px;padding-top:10px;'>";

if (($_POST['contact_id']=='') && !($_POST['edit_record']=='true'))
{
echo "<form action='edit.php' method='post' name='edit_select_form'>
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
$_SESSION['edit_contact_id']=$row['contact_id'];
mysql_close($conn);
}

echo "<form action='edit.php' method='post' name='edit_form'>
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
  <td>
   <select name='state_name'>
    <option style='background-color:#ffffcc;' value='" . $row[state_name] . "' selected='selected'>" . $row[state_name] . "</option>
    <optgroup style='background-color:green;color:white;' label='New England'>---New England---</optgroup>
    <option value='CT'>CONNECTICUT</option>
    <option value='ME'>MAINE</option>
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
   </select>
  </td>
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
  <td>Last Verified</td>
  <td><input type='text' name='last_verified' value='" . $row[last_verified] . "' /></td>
 </tr>
 <tr>
  <td colspan='2'>
  <input type='hidden' name='edit_record' value='true' />
  <input type='submit' value='Update Record' /></td>
 </tr>
</table>
</form>";
}
elseif ($_POST['edit_record']=='true')
{
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'rcmne';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die
        ('Error connecting to mysql');
mysql_select_db($dbname, $conn);
$sql="UPDATE contacts SET first_name='$_POST[first_name]', last_name='$_POST[last_name]', password='$_POST[password]', user_level='$_POST[user_level]', street='$_POST[street]', city='$_POST[city]', state_name='$_POST[state_name]', zipcode='$_POST[zipcode]', phone='$_POST[phone]', email='$_POST[email]', institution='$_POST[institution]', last_verified='$_POST[last_verified]' WHERE contact_id=" . $_SESSION[edit_contact_id];
mysql_query($sql);
if (!mysql_query($sql,$conn))
  {
  die('Error:' . mysql_error());
  }
echo "Record $contact_id was edited";

mysql_close($conn);
$_SESSION['edit_contact_id']='';
}

?>

</div>
<?php
include("footer.php"); 
?>

