<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());


$dbselect = mysql_select_db($dbname);

$nama_npm=$_POST['nama_npm'];
$Tanggal=$_POST['Tanggal'];
$lab=$_POST['lab'];
$status=$_POST['status'];
$keluhan=$_POST['keluhan'];


//simpan data ke database
if(strlen($_POST['nama_npm']) < 5 OR 
   strlen($_POST['Tanggal']) < 5 OR 
   strlen($_POST['lab']) < 1 OR
   strlen($_POST['status']) < 3 OR
   strlen($_POST['keluhan']) < 15  	
   ) { 
	header("Location:../../mahasiswa.php?status_error_data=error"); 
	}
else{

if($status=='Puas'){
$query = mysql_query("insert into laporan_keluhan values('', '$nama_npm', '$Tanggal', '$lab', '$status', '$keluhan')")or die(mysql_error());
$query2 = mysql_query("update statistik_kepuasan
	set total= total + 1
	where status_kepuasan='$status'")or die(mysql_error());
	if ($query&&$query2) {
   		header("Location:../../mahasiswa.php?status_tambah_data=success");
}	

}
if($status=='Tidak Puas'){
$query = mysql_query("insert into laporan_keluhan values('', '$nama_npm', '$Tanggal', '$lab', '$status', '$keluhan')")or die(mysql_error());
$query2 = mysql_query("update statistik_kepuasan
	set total= total + 1
	where status_kepuasan='$status'")or die(mysql_error());
	if ($query&&$query2) {
   		header("Location:../../mahasiswa.php?status_tambah_data=success");
}	

}

}


?>