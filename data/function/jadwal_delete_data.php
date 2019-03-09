<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);
$query = mysql_query("DELETE from jadwal WHERE id='$_GET[id3]'");


$hari=$_GET[hari];
$query2 = mysql_query("update statistik_hari 
	set total= total - 1
	where nama_hari='$hari'")or die(mysql_error());


if ($query) {
  header('Location:../jadwal.php?status_hapus_data=success');
}
?>