<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);
$query = mysql_query("DELETE from data_software_kc WHERE id='$_GET[id3]'");
if ($query) {
  header("Location:../data_software_KC.php?status_hapus_data=success");
}
?>