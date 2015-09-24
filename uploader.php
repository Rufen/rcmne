<?php
session_start();
if (!$_SESSION['user_level'])
{
 header("Location: login.php");
 die();
}
$menu_function="Import a file to the database";
include("header.php"); 

    	$dbhost = 'localhost';
		$dbuser = '';
		$dbpass = '';
		$dbname = '';
		$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die
        	('Error connecting to mysql');
		mysql_select_db($dbname, $conn);
		
//section 1 - open uploader.php
if (!($_POST['upload_file']=='true')){
echo "<form enctype='multipart/form-data' action='uploader.php' method='POST'>
<input type='hidden' name='MAX_FILE_SIZE' value='100000' />
Choose a file to upload: <input name='uploadedfile' type='file' /><br />
<input type='hidden' name='upload_file' value='true' />		
<input type='submit' value='Upload File' />
</form>";
}
//section 2 upload file
// Where the file is going to be placed 
elseif (($_POST['upload_file']=='true')){
$target_path = "./uploads/";

/* Add the original filename to our target path.  
Result is "uploads/filename.extension" */
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
$_FILES['uploadedfile']['tmp_name'];

//section 3 - test errors

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "<br><b>The file <u>".  basename( $_FILES['uploadedfile']['name']). 
    "</u> has been uploaded!</b> <br><br>";
    $upload_file=1;
} else{
    echo "<br>You need to browse and load the <b><u><i>uploadrcmne.csv</i></u></b> file.<br>
    	 Click on the <b>Import</b> tab again to import the file.";
    die();
}

//section to insert data into the contact table
if ($upload_file=1){ 
	$row = 1;
	$handle = fopen("./uploads/importrcmne.csv", "r");

	if ($handle)
	{
    	set_time_limit(0);
   
    //the top line is the field names
    $fields = fgetcsv($handle, 4096, ',');
   
    //loop through one row at a time
    	while (($data = fgetcsv($handle, 4096, ',')) !== FALSE)
    	{
    	$num = count($data);
		{
		$sql="INSERT INTO contacts (password, user_level, first_name, last_name, street, city, state_name, zipcode, phone, email, institution, district, last_verified) VALUES ";
		$values="('".$data[0]."', '".$data[1]."', '".$data[2]."', '".$data[3]."', '".$data[4]."', '".$data[5]."', '".$data[6]."', '".$data[7]."', '".$data[8]."', '".$data[9]."', '".$data[10]."', '".$data[11]."', '".$data[12]."')";
		$sql = $sql.$values;

		if (mysql_query($sql,$conn))
  		{
  		echo "<b>The following records have been added to the database!</b> <br><br>";
  		}
		else
  		{
  		echo "Error adding record: <b>" . mysql_error() . "</b><br><br>";
  		}

    	}
    		echo $values."<br><br>";
    	}
  		mysql_close($conn);
  	
		fclose($handle);  
		}

// after varifying records upload sucessfully
// delete the csv file that sits in upload folder

$file = "./uploads/importrcmne.csv";
if (mysql==0){
echo "<br><br><br><b>Upload file sucessfully!</b>";

if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("<br>All transactions are completed!");
  }
}
}
else echo"Invalid data!";
}

$upload_file=='';
?>

<?php
include("footer.php"); 

?>