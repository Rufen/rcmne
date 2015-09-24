<html>
<head>
<title>
   Reconciling Ministries Workshop
</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <?php ini_set('display_errors', 0); ?>
 <div style="border-bottom: solid gray 2px;">
 <h1><img src="rcm2small.jpg" style="border:solid 1px #cccccc;vertical-align:middle;" alt="">&nbsp;<?php echo $menu_function ?></h1>
 <table align="center" summary="">
 <tr align="center">
 <td class="menu">
  <a class="menu" href="../rcmne/view.php">View</a>
 </td>
 <td class="menu">
  <a class="menu" href="../rcmne/search.php">Search</a>
 </td>
 <td class="menu">
  <a class="menu" href="../rcmne/add.php">Add</a>
 </td>
<?php

echo " <td class='menu'>\r\n";
echo "  <a class='menu' href='edit.php'>Edit</a>\r\n";
echo " </td>\r\n";
echo " <td class='menu'>\r\n";
echo "  <a class='menu' href='delete.php'>Delete</a>\r\n";
echo " </td>\r\n";
?>
  <td class="menu">
  <a class="menu" href="../rcmne/uploader.php">Import</a>
 </td>
  <td class="menu">
  <a class="menu" href="../rcmne/exporter.php">Export</a>
 </td>
 <td class="menu">
  <a class="menu" href="../rcmne/logout.php">Log Out</a>
 </td>
 </tr>
 </table>
 </div>
