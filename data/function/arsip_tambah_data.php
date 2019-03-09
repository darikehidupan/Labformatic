<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());


$dbselect = mysql_select_db($dbname);

$Tahun=$_POST['Tahun'];
$Bulan=$_POST['Bulan'];
$nama_uploader=$_POST['nama_uploader'];
$kategori=$_POST['kategori'];

$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];

$folder = "../../filearsip/$nama_file";

copy($lokasi_file,"$folder");

if(strlen($_POST['Tahun']) < 4 OR 
   strlen($_POST['Bulan']) < 4 OR 
   strlen($_POST['nama_uploader']) < 4 OR
   strlen($_POST['kategori']) < 4 
   ){ 
	header("Location:../arsip_tambah_data.php?status_error_data=error&tahun=$Tahun"); 
	}
else{  
//simpan data ke database
$query = mysql_query("insert into data_arsip values('', '$Bulan', '$Tahun', '$nama_file', 
	'$nama_uploader','$kategori')")or die(mysql_error());


if ($query) {
   header("Location:../arsip_tambah_data.php?status_tambah_data=success&tahun=$Tahun");
}

}

?>