<?php
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("labformatics") or die(mysql_error());

$result = mysql_query("SELECT * FROM statistik_hari WHERE nama_hari='Senin'") 
or die(mysql_error());  

while($row = mysql_fetch_array( $result )){ 
$satu= (int) $row['total'];
}

if ($satu==2) {
	echo "satu";
	
}

else{
	echo "nope";
}

?>