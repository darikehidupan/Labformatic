<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());


$dbselect = mysql_select_db($dbname);
$nama_software=$_POST['nama_software'];
$tanggal_software=$_POST['tanggal_software'];
$status_software=$_POST['status_software'];
$deskripsi_software=$_POST['deskripsi_software'];

$timestamp = strtotime($tanggal_software);
$tanggal_software = date("Y-m-d",$timestamp);

if (strlen($_POST['nama_software']) < 4 OR strlen($_POST['deskripsi_software']) < 4) { 
	header("Location:../data_software_KC_form_tambah_data.php?status_error_data=error"); 
} 
else{  
//simpan data ke database
$query = mysql_query("insert into data_software_kc values('', '$nama_software', '$tanggal_software', '$status_software', 
	'$deskripsi_software')")or die(mysql_error());
if ($query) {
   header("Location:../data_software_KC_form_tambah_data.php?status_tambah_data=success");
}

}

?>