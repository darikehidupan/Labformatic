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
<script type="text/javascript" src="../asset/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="../asset/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../asset/datatables/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function () {
window.setTimeout(function() {
    $("#success-alert").fadeTo(800, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
});
</script>
<script type="text/javascript">
            $(document).ready(function() {
    $('table.display').DataTable( {
        "order": [[ 1,"desc" ]]
    } );
} );
</script>
<link rel="stylesheet" type="text/css" href="../asset/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../asset/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../asset/home.css">
<link rel="icon" type="image/png" href="../img/Logo Yarsi.png">
<link rel="stylesheet" type="text/css" href="../asset/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="../asset/datatables/jquery.dataTables.min.css">

<script language="javascript">
<!-- Begin
var scrl = "Data Software MDI - Labformatic || ";
function scrlsts() {
 scrl = scrl.substring(1, scrl.length) + scrl.substring(0, 1);
 document.title = scrl;
 setTimeout("scrlsts()", 250);
 }
//  End -->
</script>
</head>

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
			
			<?php include 'include_css/sidebar.php'; ?>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
	<div class="col-md-2 sidebar">
     <?php include 'include_css/sidebar_link_datasoftware.php'; ?>
    </div>
		<div class="col-md-10 content">
        	<div class="panel ">
        <!--link homepage-->
         <!--link homepage-->
          <a href="home.php"> 
              <span class="glyphicon glyphicon-home"></span>
              Homepage
          </a>
          <span>/</span>
          <a href="data_software.php"> 
              Data Software
          </a>
          <span>/</span>
          <a href="data_software_MDI.php"> 
              MDI
          </a>
          </div>
          <div class="row grid-divider">
            <div class="col-sm-1">
              <div class="col-padding">
                <a class="thumbnail" href="data_software_MDI.php">
              <img src="../img/database-icon.png">
                </a>
              </div>
          </div>
          </div>  

          <?php
          if (!empty($_GET['status_hapus_data']) && $_GET['status_hapus_data'] == 'success'){
          echo '
            <div class="alert alert-success" id="success-alert" role="alert">
            Berhasil Menghapus Data Software MDI
            </div>';
          }
          ?>   

               <!--Start awal MDI-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Lab Praktikum Manajemen Data dan Informasi - Data Software |||
                      <?php
                     mysql_connect("localhost", "root", "") or die(mysql_error());
                      mysql_select_db("labformatics") or die(mysql_error());

                      $result = mysql_query("SELECT * FROM kurikulum") 
                      or die(mysql_error());  

                      while($row = mysql_fetch_array( $result )){ 

                      echo $row['semester'];
                      echo (" - ");
                      echo ("Tahun Akademik ");
                      echo $row['tahun'];                     

                    }
                    ?>


                    </strong>
                                <a style="float:right; color:blue" href="data_software_MDI_form_tambah_data.php">Tambah Data |</a>  
                                 <a style="float:right; color:blue" href="function/MDI_software_expor.php">Export Data |</a>
                </div>
                    <div class="panel-body">
                            <div class="table-responsive">
                                <table class="display" class="table table-striped table-bordered table-hover">
                                    <thead>

                                        <tr>
						<th width="7%">Nama Software</th>
                        <th width="10%">Tanggal Software</th>
                        <th width="8%"> Status Software</th>
                        <th width="12%">Deskripsi Software</th>
						<th width="15%">Aksi</th>
                    </tr>
                                    </thead>
									
									<tbody>
                    <?php

                    //Data mentah yang ditampilkan ke tabel    
                    mysql_connect('localhost', 'root', '');
                    mysql_select_db('labformatics');
                    $sql = mysql_query('SELECT * FROM data_software_mdi');
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['id'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $r['nama_software'];?></td>
                        <td><?php echo  $r['tanggal_software']; ?></td>
						<td><?php echo  $r['status_software']; ?></td>
                        <td><?php echo  $r['deskripsi_software']; ?></td>
                        <td>
                            <a href="data_software_MDI_lihat.php?id1=<?php echo $r['id'];?>">Lihat</a> | 
                            <a href="data_software_MDI_edit.php?id2=<?php echo $r['id'];?>">Edit</a> |
							              <a href="function/MDI_delete_data_software.php?id3=<?php echo $r['id'];?>"
                            onclick="javascript:return confirm('Apakah Anda Yakin Ingin Menghapusnya ?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
                                </table>
								
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