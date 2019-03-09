<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);
$query = mysql_query("DELETE from tahun_arsip WHERE tahun='$_GET[tahun]'");

if ($query) {
   header("Location:../setting_admin_tambah_tahun_arsip.php?status_hapus_tahun_arsip=success");
}

