<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);

$id2=$_POST['id'];
$hari=$_POST['hari'];
$mata_kuliah=$_POST['mata_kuliah'];
$sks=$_POST['sks'];
$nama_dosen=$_POST['nama_dosen'];
$jam_mulai=$_POST['jam_mulai'];
$jam_selesai=$_POST['jam_selesai'];
$laboratorium=$_POST['laboratorium'];
$asdos=$_POST['asdos'];


$query = mysql_query("update jadwal set
hari='$hari', 
mata_kuliah='$mata_kuliah', 
sks='$sks',  
nama_dosen='$nama_dosen',
jam_mulai='$jam_mulai',
jam_selesai='$jam_selesai',
laboratorium='$laboratorium',
asdos='$asdos'
where id='$id2'")or die(mysql_error());


if ($query) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}


?>
