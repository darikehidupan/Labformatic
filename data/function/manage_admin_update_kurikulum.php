<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);

$tahun=$_POST['tahun'];
$semester=$_POST['semester'];

$query = mysql_query("update kurikulum set
tahun='$tahun', 
semester='$semester'
where id=1")or die(mysql_error());

if ($query) {
  header("Location:../setting_admin_tahun_akademik.php?status_update_tahun_akademik=success");
}


?>