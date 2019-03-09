<?php require_once('Labformatic.php'); ?>
<?php
 //Koneksi database
    mysql_connect("localhost","root","") or die(mysql_error());
    mysql_select_db("labformatics") or die (mysql_error());
?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../../dosen.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../../dosen.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<head>
<script type="text/javascript" src="../../asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../asset/js/jquery.js"></script>
<script type="text/javascript" src="../../asset/js/bootstrap.js"></script>
<script type="text/javascript" src="../../asset/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="../../asset/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../asset/datatables/jquery.dataTables.js"></script>
<script type="text/javascript">
            $(document).ready(function() {
    $('table.display').DataTable( {
        "order": [[ 1,"desc" ]]
    } );
} );
</script>
<link rel="stylesheet" type="text/css" href="../../asset/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../asset/bootstrap.min2.css">
<link rel="stylesheet" type="text/css" href="../../asset/home.css">
<link rel="icon" type="image/png" href="../../img/Logo Yarsi.png">
<link rel="stylesheet" type="text/css" href="../../asset/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../asset/datatables/jquery.dataTables.min.css">

<script language="javascript">
<!-- Begin
var scrl = "Lihat Data Jadwal - Labformatic || ";
function scrlsts() {
 scrl = scrl.substring(1, scrl.length) + scrl.substring(0, 1);
 document.title = scrl;
 setTimeout("scrlsts()", 250);
 }
//  End -->
</script>
</head>
<?php
include('Labformatic.php');
$id1= $_GET['id1'];
$sambung = mysql_connect("Localhost", "root", "") or die ("Gagal konek ke server.");
mysql_select_db("labformatics") or die ("Gagal membuka database.");
$query = "select * from jadwal where id='$id1'";
$result =  mysql_query($query, $sambung) or die("gagal melakukan query");
     $buff = mysql_fetch_array($result);
                 mysql_close($sambung);
				 
?>
<body onLoad="scrlsts()">
<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid	">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a id="navbar_top" class="navbar-brand" href="jadwal.php">
				Labformatic
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			
			
			<?php include 'sidebar.php'; ?>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
	<div class="col-md-1 sidebar">
      
    </div>
		<div class="col-md-10 content">
        	<div class="panel ">
        <!--link homepage-->
         <!--link homepage-->
          <a href="jadwal.php">  
              <span class="glyphicon glyphicon-home"></span>
              Jadwal Mata Kuliah
          </a>
          <span>/</span>
           <a href=""> 
             Lihat Data Jadwal
          </a>
          </div>  
               
          <div class="panel panel-default">
                <div class="panel-heading">
                <strong>Jadwal Mata Kuliah - Form Lihat Data Jadwal</strong>
                </div>
                <div class="panel-body">
                <!--Form Input Tambah Data Software-->
                 <form name="Tambah_data_jadwal" action="function/jadwal_tambah_data.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id1; ?>" />
        <table class="table table-striped table-bordered table-hover">
       <tr>
              <td>Hari</td>
                <td>
                <input size="25px" name="hari" type="text" list="hari" 
                placeholder="Masukan Hari Mata Kuliah" value="<?php echo $buff['hari']; ?>" readonly="readonly" />
                </td>
                <datalist id="hari">
                <option value="Senin"></option>
                <option value="Selasa"></option>
                <option value="Rabu"></option>
                <option value="Kamis"></option>
                <option value="Jumat"></option>
                <option value="Sabtu"></option>
                </datalist>
            </tr>
             <tr>
              <td>Nama Mata Kuliah</td>
                <td>
                <input size="35px" name="mata_kuliah" type="text" placeholder="Nama Mata Kuliah"  
                value="<?php echo $buff['mata_kuliah']; ?>"
               readonly="readonly"/>
                </td>
            </tr>
             <tr>
              <td>SKS</td>
                <td>
                <input size="25px" name="sks" type="text" list="sks" placeholder="Masukan Jumlah SKS" 
                value="<?php echo $buff['sks']; ?>"
                readonly="readonly"/>
                </td>
                <datalist id="sks">
                <option value="1"></option>
                <option value="2"></option>
                <option value="3"></option>
                <option value="4"></option>
                </datalist>
            </tr>
             <tr>
              <td id="tableformteks">Nama Dosen Pengajar</td>
                <td>
                <?php 
                //Koneksi database     
                mysql_connect("localhost","root","") or die(mysql_error());     
                mysql_select_db("labformatics") or die (mysql_error()); ?>  
                <input size="40"  type="text" list="nama_dosen" 
                name="nama_dosen" placeholder="Masukan Nama Dosen Pengajar"
                value="<?php echo $buff['nama_dosen']; ?>"
                 required />                    
                <datalist id="nama_dosen">
                <?php echo "<select>";     
                $myquery="select nama_dosen from data_dosen";     
                $daftar_kategori=mysql_query($myquery) or die (mysql_error());     
                while($dataku=mysql_fetch_object($daftar_kategori))     
                {         //perulangan menampilkan data         
                echo "<option>$dataku->nama_dosen</option>";     
                }     
                echo "</select>"; ?>
                </datalist>
                </td>   
            </tr>
            <tr>
            <td>Jam Mulai Perkuliahan</td>
            <td>
               <input size="29px" name="jam_mulai" type="text" readonly="readonly" 
              value="<?php echo $buff['jam_mulai']; ?>"
               placeholder="Masukan Jam Mulai Perkuliahan">
            </td>
            <tr>
            <td>Jam Berakhir Perkuliahan</td>
            <td>
               <input size="29px" name="jam_selesai" type="text" readonly="readonly" 
               value="<?php echo $buff['jam_selesai']; ?>"
               placeholder="Masukan Jam Berakhir Perkuliahan">
            </td>
            </tr>
             <tr>
              <td>Lokasi Ruangan</td>
                <td>
                <input size="40px" name="laboratorium" type="text" list="laboratorium" placeholder="Masukan Ruang Laboratorium Perkuliahan"
                value="<?php echo $buff['laboratorium']; ?>"
                readonly="readonly" />
                </td>
                <datalist id="laboratorium">
                <option value="MDI"></option>
                <option value="JK"></option>
                <option value="KC"></option>
                </datalist>
            </tr>
            <td>Asisten Dosen Yang Bertanggung Jawab</td>
            <td>
               <input size="29px" name="asdos" type="text" readonly="readonly"
               value="<?php echo $buff['asdos']; ?>"
               placeholder="Masukan Nama Asdos / NPM">
            </td>
            </tr>

            <tr>
            <td>&nbsp;</td>
            <td  colspan="2" width="200">
                  <a href="jadwal.php">
                  <input type="button" value="Kembali" class="btn btn-info" />
                  </a>                      
            </td>
            </tr>            
        </table>
        </form>  
        <center>
		<footer>
			<p class="col-md-12">
				<hr class="divider">
				Copyright &COPY;
                <?php
					date_default_timezone_set("Asia/Bangkok");
					$tgl=date('Y');
					echo $tgl;
						?> 
                Midnight
			</p>
		</footer>
        </center>
	</div>
    </body>