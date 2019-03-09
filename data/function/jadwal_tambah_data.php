<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());


$dbselect = mysql_select_db($dbname);
$hari=$_POST['hari'];
$mata_kuliah=$_POST['mata_kuliah'];
$sks=$_POST['sks'];
$nama_dosen=$_POST['nama_dosen'];
$jam_mulai=$_POST['jam_mulai'];
$jam_selesai=$_POST['jam_selesai'];
$laboratorium=$_POST['laboratorium'];
$asdos=$_POST['asdos'];

if(strlen($_POST['hari']) < 4 OR 
   strlen($_POST['mata_kuliah']) < 4 OR 
   strlen($_POST['sks']) < 4 OR
   strlen($_POST['nama_dosen']) < 4 OR
   strlen($_POST['jam_mulai']) < 4 OR
   strlen($_POST['jam_selesai']) < 4 OR
   strlen($_POST['laboratorium']) < 4 OR
   strlen($_POST['asdos']) < 4
   ) { 
	header("Location:../jadwal_form_tambah_data.php?status_error_data=error"); 
	}
else{
  
//simpan data ke database
$query = mysql_query("insert into jadwal values('', '$hari', '$mata_kuliah', '$sks', 
	'$nama_dosen','$jam_mulai','$jam_selesai','$laboratorium','$asdos')")or die(mysql_error());

$query2 = mysql_query("update statistik_hari 
	set total= total + 1
	where nama_hari='$hari'")or die(mysql_error());


if ($query&&$query2) {
   header('Location:../jadwal_form_tambah_data.php?status_tambah_data=success');
}

}

?>