<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);

$result = mysql_query("SELECT nama_file FROM data_arsip WHERE id=$_GET[id3]");
$row = mysql_fetch_assoc($result);
$hapus=$row['nama_file'];
echo($hapus);
$query = mysql_query("DELETE from data_arsip WHERE id='$_GET[id3]'");
$query2= unlink("../../filearsip/$hapus");


if ($query) {
  header('Location:../arsip_rekap.php?status_hapus_data=success');
}
?>