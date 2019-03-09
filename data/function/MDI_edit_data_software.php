<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);

$id2=$_POST['id'];
$nama_software=$_POST['nama_software'];
$tanggal_software=$_POST['tanggal_software'];
$status_software=$_POST['status_software'];
$deskripsi_software=$_POST['deskripsi_software'];


$query = mysql_query("update data_software_mdi set
nama_software='$nama_software', 
tanggal_software='$tanggal_software', 
status_software='$status_software',  
deskripsi_software='$deskripsi_software'
where id='$id2'")or die(mysql_error());


if ($query) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}


?>
