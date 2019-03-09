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
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="icon" type="image/png" href="../img/Logo Yarsi.png";/>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

<script language="javascript">
<!-- Begin
var scrl = "Home - Labformatic || ";
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
			<form class="navbar-form navbar-left" method="GET" role="search">
				<div class="form-group">
					<input type="text" name="q" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="http://yarsi.ac.id" target="_blank">Official Yarsi</a></li>
				<li class="dropdown ">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						Akun anda
						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-header"></li>
							<li class=""><a href="home.php">Profil Anda</a></li>
							<li class=""><a href="#">Website Official Yarsi</a></li>
							<li class=""><a href="#">Other Link</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $logoutAction ?>">Keluar</a></li>							
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container" style="background-color:#222">
		<div class="col-md-2 sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li class="active"><a href="#">Homepage</a></li>
				<li><a href="arsip.php">Arsip</a></li>
                <li><a href="#">Jadwal</a></li>
				<li><a href="#">Data inventaris</a></li>
				<li><a href="#">Data asdos</a></li>
                <li><a href="data_software.php">Data Software</a></li>
                <li><a href="#">Laporan Lab</a></li>
                <li><a href="#">Laporan Mahasiswa</a></li>
                
				
			</ul>
		</div>
		<div class="col-md-10 content">
			<div class="panel ">
        <!--link homepage-->
        	<a href="home.php" target="blank"> 
          		<span class="glyphicon glyphicon-home"></span>
           		Homepage
        	</a>
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