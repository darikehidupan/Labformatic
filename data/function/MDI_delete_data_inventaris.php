<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);


$jumlah1=$_GET['jumlah1'];
$nama_barang1=$_GET['nama_barang1'];



$result1 = mysql_query("SELECT * from data_inventaris_mdi WHERE id='$_GET[id3]'");
$row = mysql_fetch_array($result1);
$row['jumlah'];
$jumlah_dari_table_asli = $row['jumlah'];

$result = mysql_query("SELECT * from data_inventaris_mdi_total WHERE nama_barang='$_GET[nama_barang1]'");
$row = mysql_fetch_array($result);
$row['jumlah'];
$jumlah_dari_table_total = $row['jumlah'];

$total=$jumlah_dari_table_total-$jumlah_dari_table_asli;

if($total==0){
	$query = mysql_query("DELETE from data_inventaris_mdi WHERE id='$_GET[id3]'");
	$query2 = mysql_query("DELETE from data_inventaris_mdi_total WHERE nama_barang='$_GET[nama_barang1]'");
	if ($query&&$query2) {
  	header('Location:../data_inventaris_mdi.php?status_hapus_data=success');
	}
}
else if($total>0){
	$query3 = mysql_query("DELETE from data_inventaris_mdi WHERE id='$_GET[id3]'");
	$query4 = mysql_query("update data_inventaris_mdi_total 
	set jumlah= jumlah - $jumlah1
	where nama_barang='$nama_barang1'")or die(mysql_error());
	if ($query3&&$query4) {
  header("Location:../data_inventaris_mdi.php?status_hapus_data=success");
}
}

?>