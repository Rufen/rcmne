<?php
header("Content-type:application/csv");

// It will be called downloaded.csv
header("Content-Disposition:attachment;filename=downloadfile.csv");
header("Pragma: no-cache");
header("Expires: 0");
// The CSV source is in downloaded.csv
readfile("./downloads/downloadfile.csv");
?>
