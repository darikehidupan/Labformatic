<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());


$dbselect = mysql_select_db($dbname);
$tahun=$_POST['tahun'];
  
//simpan data ke database
$query = mysql_query("insert into tahun_arsip values('', '$tahun')")or die(mysql_error());


if ($query) {
   header("Location:../setting_admin_tambah_tahun_arsip.php?status_tambah_tahun_arsip=success");
}


?>