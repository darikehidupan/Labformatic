<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());


$dbselect = mysql_select_db($dbname);
$username=$_POST['username'];
$password=$_POST['password'];
  
//simpan data ke database
$query = mysql_query("insert into admin values('', '$username', '$password')")or die(mysql_error());


if ($query) {
   header("Location:../setting_admin_manage_username.php?status_tambah_username_data=success");
}


?>