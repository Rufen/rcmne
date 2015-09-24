<?php
session_start();
if (!$_SESSION['user_level'])
{
 header("Location: login.php");
 die();
}
$search_attrib=$_POST['search_attrib'];
$menu_function="Export information";
include("header.php");
echo "
<style type='text/css'>
#tblview td, #tblview th {border:solid gray 1px;}
</style>
<form name='theForm' action='exporter.php' method='POST'>
<input type='checkbox' name='c[]' value='Contact_Id'>Contact id
<input type='checkbox' name='c[]' value='first_name'>First Name
<input type='checkbox' name='c[]' value='last_name'>Last Name
<input type='checkbox' name='c[]' value='password'>password
<input type='checkbox' name='c[]' value='user_level'>User level
<input type='checkbox' name='c[]' value='street'>Street Address
<input type='checkbox' name='c[]' value='city'>City
<input type='checkbox' name='c[]' value='state_name'>State
<input type='checkbox' name='c[]' value='zipcode'>Zipcode
<input type='checkbox' name='c[]' value='phone'>Phone Number
<input type='checkbox' name='c[]' value='email'>Email
<input type='checkbox' name='c[]' value='institution'>Institution
<input type='checkbox' name='c[]' value='district'>District
<input type='checkbox' name='c[]' value='last_verified'>Last verified
<input type='hidden' name='testval' value='testval'>
<input type='submit' value='Submit'>                                                                              
</form>
";
if (!($_SESSION['email']=='' || $_SESSION['user_level']==''))
{
$dbhost = 'localhost';
$dbuser = '';
$dbpass = '';
$dbname = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die
        ('Error connecting to mysql');
mysql_select_db($dbname, $conn);

//create a file name exportrcmne.csv 
//open contact table, take the data from table
//write them to exportrcmne.csv
if ($_POST["testval"]=="testval") {
$cols_header = "";
$sql_select = "";
$c = $_POST["c"];
$cols = 0;
for ($i=0; $i<=14; $i++) {
	if ($c[$i]!="") {
		$cols++;
//		$cols_header = $cols_header . "\"" . $c[$i] . "\"";
		$sql_select = $sql_select . $c[$i];
		if ($c[$i + 1]!="") {
			$cols_header = $cols_header . ", ";
			$sql_select = $sql_select . ", ";
		}
	}
}
echo "Selected field(s): " . $sql_select;
$cols_header = $sql_select;
$sql_select = "SELECT " . $sql_select . " FROM Contacts";
writeFile($sql_select, $cols_header, $cols);
// echo "<br><a href='./downloads/downloadfile.csv'>Download the file</a>";
echo "<br><a href='phpdownload.php'><br>Download the file</a><br>";
if (stristr($sql_select, "zip") == true ) {
echo "<br>To view <b>zipcode</b> data in the csv file in Excel correctly, please do the following: <br \>";
echo "1. Right click the whole field of the zipcode column in Excel<br \>";
echo "2. Select Format Cell tab at popup<br \>";
echo "3. Select Special in the category box<br \>";
echo "4. OK" ;
}
}
}

include("footer.php");


function writeFile($sql_select, $cols_header, $cols)
  {
   	$query = mysql_query($sql_select);
	$fp = fopen('./downloads/downloadfile.csv','w');
	fwrite($fp, $cols_header . "\r\n");
	while ($row = mysql_fetch_array($query)) {
		for ($i=0; $i<=$cols; $i++) {
			$nextline = $row[$i];
			if ($i != $cols) {
				fwrite($fp, $nextline . ",");
				}
			else {
				fwrite($fp,$nextline);
				}
			} 
		fwrite($fp,"\r\n");		
	}
	fclose($fp); 
  }
?>

