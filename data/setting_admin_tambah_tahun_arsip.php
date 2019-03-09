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
	
  $logoutGoTo = "../index.php";
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

$MM_restrictGoTo = "../index.php";
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
<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../asset/js/jquery.js"></script>
<script type="text/javascript" src="../asset/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="../asset/home.css">
<link rel="icon" type="image/png" href="../img/Logo Yarsi.png";/>
<link rel="stylesheet" type="text/css" href="../asset/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../asset/bootstrap.min.css">
<script type="text/javascript">
$(document).ready(function () {
window.setTimeout(function() {
    $("#success-alert").fadeTo(800, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
});
</script>

<script language="javascript">
<!-- Begin
var scrl = "Admin - Tambah Tahun Arsip - Labformatic || ";
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
$sambung = mysql_connect("Localhost", "root", "") or die ("Gagal konek ke server.");
mysql_select_db("labformatics") or die ("Gagal membuka database.");
$query = "select * from tahun_arsip where id='1'";
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
			<a id="navbar_top" class="navbar-brand" href="home.php">
				Labformatic
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="http://yarsi.ac.id" target="blank">Official Yarsi</a></li>
				<li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            Pengaturan Admin
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class="dropdown-header"></li>
              <li class=""><a href="setting_admin_manage_username.php">Manage Username Admin</a></li>
              <li class=""><a href="setting_admin_tahun_akademik.php">Setting Tahun Akademik</a></li>
              <li class="active"><a href="setting_admin_tambah_tahun_arsip.php">Manage Tahun Arsip</a></li>
              <li class=""><a href="#">Other Link</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo $logoutAction ?>">Keluar</a></li>             
            </ul>
          </li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
	<div class="col-md-2 sidebar">
     <ul class="nav nav-pills nav-stacked">
       <li ><a href="home.php">Homepage</a></li>
         <ul class="nav nav-pills nav-stacked left-menu" id="stacked-menu">
          <li data-toggle="collapse" data-target="#item1" data-parent="#stacked-menu" >
            <a>Arsip
            <span class="caret arrow"></span></a>
              <ul class="nav nav-stacked collapse left-submenu" id="item1">
                <li><a href="arsip_tambah_data.php">Tambah Data Arsip</a></li>
                <li><a href="arsip_rekap.php">Rekap Data Arsip</a></li>
                 <?php
                mysql_connect("localhost","root","") or die(mysql_error());     
                mysql_select_db("labformatics") or die (mysql_error()); 
                $myquery="select tahun from tahun_arsip";     
                $daftar_kategori=mysql_query($myquery) or die (mysql_error());     
                while($dataku=mysql_fetch_object($daftar_kategori))
                echo "<li><a href='arsip_rekap_search.php?tahun1=$dataku->tahun'>$dataku->tahun</a></li>" ?>
              </ul>
          </li>
        <li><a href="jadwal.php">Jadwal Mata Kuliah</a></li>
        <li><a href="data_inventaris.php">Data inventaris</a></li>
                <li><a href="data_software.php">Data Software</a></li>
                <li><a href="#">Laporan Lab</a></li>
                 <li><a href="laporan_mahasiswa.php">Laporan Mahasiswa</a></li>
      </ul>
      </ul>
    </div>
		<div class="col-md-10 content">
			<div class="panel ">
        <!--link homepage-->
        	<a href=""> 
          		<span class="glyphicon glyphicon-wrench"></span>
           		 Pengaturan Admin
        	</a>
          <span>/</span>
          <a href="setting_admin_tahun_akademik.php"> 
              Tambah / Hapus Tahun Arsip
          </a>
           </div>


          <?php
          if (!empty($_GET['status_tambah_tahun_arsip']) && $_GET['status_tambah_tahun_arsip'] == 'success'){
          echo '
            <div class="alert alert-success" id="success-alert" role="alert">
            Berhasil Menambah Tahun Arsip
            </div>';
          }
          ?>

          <?php
          if (!empty($_GET['status_hapus_tahun_arsip']) && $_GET['status_hapus_tahun_arsip'] == 'success'){
          echo '
            <div class="alert alert-success" id="success-alert" role="alert">
            Berhasil Menghapus Tahun Arsip
            </div>';
          }
          ?>
        <p style="font-family: Roboto; font-size: 20px;">Manage Tahun Arsip</p>  
    <div class="row grid-divider">
      <div class="col-sm-7">
       <div class="col-padding">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
       <form name="Tambah_Tahun_Arsip" action="function/manage_admin_tambah_tahun_arsip.php" method="post">
        <table class="table table-striped table-bordered table-hover">
        
        <tr>
              <td>Tahun Arsip yang ingin ditambahkan</td>
                <td>
                <input name="tahun" type="text" placeholder="Masukan Tahun"  required="required">
                </td>
            </tr>   

            <tr>
            <td>&nbsp;</td>
            <td  colspan="2">
                <input type="submit" value="Tambahkan" class="btn btn-success">
                 <a href="javascript:history.back()">
                  <input type="button" value="Kembali" class="btn btn-info" />
                  </a>                      
            </td>
            </tr>            
        </table>
        </form>

         <hr/>
          <p style="font-family: Roboto; font-size: 20px;">Hapus Tahun Arsip</p>  
        <form name="Tambah_Tahun_Arsip" action="function/manage_admin_hapus_tahun_arsip.php" method="get">
        <table class="table table-striped table-bordered table-hover">  

            <tr>
              <td>Tahun Arsip yang ingin ditiadakan</td>
                <td>
                <?php 
                //Koneksi database     
                mysql_connect("localhost","root","") or die(mysql_error());     
                mysql_select_db("labformatics") or die (mysql_error()); ?>  
                <input size="40"  type="text" list="tahun_hapus" 
                name="tahun" placeholder="Tahun yang akan di hapus" required />                    
                <datalist id="tahun_hapus">
                <?php echo "<select>";     
                $myquery="select tahun from tahun_arsip";     
                $Tahun_yang_akan_dihapus=mysql_query($myquery) or die (mysql_error());     
                while($dataku=mysql_fetch_object($Tahun_yang_akan_dihapus))     
                {         //perulangan menampilkan data         
                echo "<option>$dataku->tahun</option>";     
                }     
                echo "</select>"; ?>
                </datalist>
                </td>   
            </tr>

            <tr>
            <td>&nbsp;</td>
            <td  colspan="2">
                <input type="submit" value="Hapus" class="btn btn-danger">
                 <a href="javascript:history.back()">
                  <input type="button" value="Kembali" class="btn btn-info" />
                  </a>                      
            </td>
            </tr>            
        </table>
        </form>
      </div>
    </div>
    </div>
           
		</div>
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