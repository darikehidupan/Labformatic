<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);
$query = mysql_query("DELETE from laporan_keluhan WHERE id='$_GET[id3]'");

$status=$_GET['status'];
$query2 = mysql_query("update statistik_kepuasan 
	set total= total - 1
	where status_kepuasan='$status'")or die(mysql_error());


if ($query) {
  header('Location:../laporan_mahasiswa.php?status_hapus_data=success');
}
?>