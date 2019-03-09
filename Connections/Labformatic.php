<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Labformatic = "Localhost";
$database_Labformatic = "labformatics";
$username_Labformatic = "root";
$password_Labformatic = "";
$Labformatic = mysql_pconnect($hostname_Labformatic, $username_Labformatic, $password_Labformatic) or trigger_error(mysql_error(),E_USER_ERROR); 
?>