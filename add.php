<?php
session_start();
if (!$_SESSION['user_level'])
{
 header("Location: login.php");
 die();
}
$menu_function="Add records to the database";
include("header.php"); 
echo "<div style='height:400px;padding-top:10px;'>\r\n";
echo "<form action='add.php' method='post' name='add_form'>\r\n";
echo "<table summary=''>\r\n";
echo " <tr>\r\n";
echo "  <td>First Name</td>\r\n";
echo "  <td><input type='text' name='first_name' />[required]</td>\r\n";
echo " </tr>\r\n";
echo " <tr>\r\n";
echo "  <td>Last Name</td>\r\n";
echo "  <td><input type='text' name='last_name' />[required]</td>\r\n";
echo " </tr>\r\n";
echo " <tr>\r\n";
echo "  <td>Password</td>\r\n";
echo "  <td><input type='text' name='password' /></td>\r\n";
echo " </tr>\r\n";
if ($_SESSION['user_level']=="A")
{
echo " <tr>\r\n";
echo "  <td>User Level</td>\r\n";
echo "  <td>
		 		<select name='user_level'>
								<option value='A'>Administrator</option>
								<option value='C' selected='selected' >Client</option>
								<option value='M'>Manager</option>
				</select>
				</td>\r\n";
echo " </tr>\r\n";
}
echo " <tr>\r\n";
echo "  <td>Street</td>\r\n";
echo "  <td><input type='text' name='street' /></td>\r\n";
echo " </tr>\r\n";
echo " <tr>\r\n";
echo "  <td>City</td>\r\n";
echo "  <td><input type='text' name='city' /></td>\r\n";
echo " </tr>\r\n";
echo " <tr>\r\n";
echo "  <td>State</td>\r\n";
echo "  <td>
   <select name='state_name'>
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
   </select>
  </td>\r\n";
echo " </tr>\r\n";
echo " <tr>\r\n";
echo "  <td>Zip Code</td>\r\n";
echo "  <td><input type='text' name='zipcode' /></td>\r\n";
echo " </tr>\r\n";
echo " <tr>\r\n";
echo "  <td>Phone</td>\r\n";
echo "  <td><input type='text' name='phone' /></td>\r\n";
echo " </tr>\r\n";
echo " <tr>\r\n";
echo "  <td>Email</td>\r\n";
echo "  <td><input type='text' name='email' /></td>\r\n";
echo " </tr>\r\n";
echo " <tr>\r\n";
echo "  <td>Institution</td>\r\n";
echo "  <td><input type='text' name='institution' /></td>\r\n";
echo " </tr>\r\n";
echo " <tr>\r\n";
echo "  <td>District</td>\r\n";
echo "  <td><input type='text' name='district' /></td>\r\n";
echo " </tr>\r\n";
echo " <tr>\r\n";
echo "  <td>Last Verified</td>\r\n";
echo "  <td><input type='text' name='last_verified' /></td>\r\n";
echo " </tr>\r\n";
echo " <tr>\r\n";
echo "  <td colspan='2'><input type='submit' value='Add Record' /></td>\r\n";
echo " </tr>\r\n";
echo "</table>\r\n";
echo "</form>\r\n";
if (!($_SESSION['email']=='' || $_SESSION['user_level']==''))
{
if (!($_POST['first_name']=='' || $_POST['last_name']==''))
{
$dbhost = 'localhost';
$dbuser = '';
$dbpass = '';
$dbname = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die
        ('Error connecting to mysql');
mysql_select_db($dbname, $conn);
$user_level_assigned = '';
if ($_SESSION['user_level']=="A")
{
 $user_level_assigned = $_POST[user_level];
}
elseif ($_SESSION['user_level']=="M")
{
 $user_level_assigned = "C";
}
$sql="INSERT INTO contacts (first_name, last_name, password, user_level, street, city, state_name, zipcode, phone, email, institution, district, last_verified)
VALUES
('$_POST[first_name]','$_POST[last_name]','$_POST[password]','$user_level_assigned','$_POST[street]','$_POST[city]','$_POST[state_name]','$_POST[zipcode]','$_POST[phone]','$_POST[email]','$_POST[institution]','$_POST[district]','$_POST[last_verified]')";

if (!mysql_query($sql,$conn))
  {
  die('Error: ' . mysql_error());
  }
echo "Record was added";

mysql_close($conn);
}
}
?>
</div>
<?php
include("footer.php"); 
?>

