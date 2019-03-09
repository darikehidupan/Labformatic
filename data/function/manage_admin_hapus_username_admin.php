<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);
$query = mysql_query("DELETE from admin WHERE username='$_GET[username]'");

if ($query) {
   header("Location:../setting_admin_manage_username.php?status_hapus_username_data=success");
}

