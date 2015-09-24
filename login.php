<?php
$message='';
if (!($_POST['email']=='' || $_POST['password']=='') && $_POST['loginflag']=='1')
{
$dbhost = 'localhost';
$dbuser = '';
$dbpass = '';
$dbname = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die
        ('Error connecting to mysql');
mysql_select_db($dbname, $conn);

$result = mysql_query("SELECT * FROM contacts WHERE email='" . $_POST["email"] . "' AND password='" . $_POST["password"] . "'");
if (mysql_num_rows($result)==1 && (mysql_result($result,0,'user_level')=='A' || mysql_result($result,0,'user_level')=='M'))
  {
  session_start();
  $_SESSION['email']=mysql_result($result,0,'email');
  $_SESSION['first_name']=mysql_result($result,0,'first_name');
  $_SESSION['last_name']=mysql_result($result,0,'last_name');
  $_SESSION['user_level']=mysql_result($result,0,'user_level');
  header('Location: ../rcmne/home.php');
  }
elseif (mysql_num_rows($result)==1 && mysql_result($result,0,'user_level')=='C')
  {
  $message="You don't have permissions to log in";
  } 
elseif (mysql_num_rows($result)==0)
  {
  $message="Invalid login information";
  } 
else
  {
  $message="Invalid login information";
  } 
  mysql_close($conn);
}
elseif (($_POST['email']=='' || $_POST['password']=='') && $_POST['loginflag']=='1')
{
  $message="User &amp; password cannot be blank";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title>
   Policy Certificates - Log In
  </title>
  <link href="../rcmne/style.css" rel="stylesheet" type="text/css">
 </head>
 <body>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <form action="../rcmne/login.php" method="post" name="rcmne_login">
  <table align="center" style="padding:0;border-collapse:collapse;border:solid gray 2px;width:600px;background-color:#ffffff;">
   <tr>
    <td style="padding:0;margin:0;"><img src="rcm1small.jpg" alt=""></td>
    <td>
     <table border="0" width="300">
      <tr>
       <td align="right" height="50" width="40%">Email:</td>
       <td align="left" height="50" width="60%"><input type="text" maxlength="32" name="email"></td>
      </tr>
      <tr>
       <td align="right" height="50">Password:</td>
       <td align="left" height="50"><input type="password" maxlength="32" name="password"></td>
      </tr>
      <tr>
       <td colspan="2" align="center"><input type="submit" style="width:100px;background-color:#eeeeee;color:#000080;" value="Log In"></td>
      </tr>
      <tr>
       <td colspan="2" align="center" height="50" style="color:red;font-weight:bold;"><?php echo $message; ?></td>
      </tr>
     </table>
    </td>
   </tr>
  </table>
  <input type="hidden" name="loginflag" value="1">
  </form>
 </body>
</html>
