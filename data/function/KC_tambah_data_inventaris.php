<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = '';
$dbname = 'labformatics';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());


$dbselect = mysql_select_db($dbname);
$nama_barang=$_POST['nama_barang'];
$tanggal=$_POST['tanggal'];
$merk=$_POST['merk'];
$jumlah=$_POST['jumlah'];
$keterangan=$_POST['keterangan'];

$timestamp = strtotime($tanggal);
$tanggal = date("Y-m-d",$timestamp);

if (strlen($_POST['nama_barang']) < 4 OR strlen($_POST['merk']) < 4 OR strlen($_POST['keterangan']) < 4) { 
	header("Location:../data_inventaris_KC_form_tambah_data.php?status_error_data=error"); 
	}
else{	 

$sql = "SELECT * FROM data_inventaris_kc_total where nama_barang = '$nama_barang'";
$res = mysql_query($sql);
if($res && mysql_num_rows($res)>0){
	$query1 = mysql_query("update data_inventaris_kc_total set 
	tanggal='$tanggal',
	jumlah = jumlah + '$jumlah'
	where nama_barang='$nama_barang'")or die(mysql_error());

	$query2 = mysql_query("insert into data_inventaris_kc values('', '$nama_barang', '$tanggal', '$merk', '$jumlah', 
	'$keterangan')")or die(mysql_error());

	if ($query1&&$query2) {	
   	header("Location:../data_inventaris_kc_form_tambah_data.php?status_tambah_data=success");
	}
} else {
  
	$query = mysql_query("insert into data_inventaris_kc values('', '$nama_barang', '$tanggal', '$merk', '$jumlah', 
	'$keterangan')")or die(mysql_error());

	$query2 = mysql_query("insert into data_inventaris_kc_total values('', '$nama_barang', '$tanggal', 
		'$jumlah')")or die(mysql_error());


	if ($query&&$query2) {	
   	header("Location:../data_inventaris_kc_form_tambah_data.php?status_tambah_data=success");
	}

}

}

?>

