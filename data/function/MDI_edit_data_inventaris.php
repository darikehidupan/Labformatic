<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);

$id2=$_POST['id'];
$nama_barang=$_POST['nama_barang'];
$merk=$_POST['merk'];
$jumlah=$_POST['jumlah'];
$keterangan=$_POST['keterangan'];


$query = mysql_query("update data_inventaris_mdi set
nama_barang='$nama_barang', 
merk='$merk', 
jumlah='$jumlah',  
keterangan='$keterangan'
where id='$id2'")or die(mysql_error());


if ($query) {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}


?>
