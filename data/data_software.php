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

<script language="javascript">
<!-- Begin
var scrl ="Data Software - Labformatic || ";
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
  <div class="container-fluid ">
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
          <a href="home.php"> 
              <span class="glyphicon glyphicon-home"></span>
              Homepage
          </a>
          <span>/</span>
          <a href="data_software.php"> 
              Data Software
          </a>
      </div>
      <!--Content-->
        <h3>Sub Pilihan Data Software Lab Praktikum</h3>
        <hr/>
    <div class="row grid-divider">
      <div class="col-sm-2">
       <div class="col-padding">
       <a class="thumbnail" href="data_software_KC.php">
       <img src="../img/programming icon.png">
       <center>
       <p>KC - Komputasional Cerdas</p>
       </center>
       </a>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="col-padding">
       <a class="thumbnail" href="data_software_MDI.php">
       <img src="../img/database-icon.png">
       <center>
       <p>MDI - Manajemen Data dan Informasi</p>
       </center>
       </a>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="col-padding">
       <a class="thumbnail" href="data_software_JK.php">
       <img src="../img/networking icon.png">
       <center>
       <p>JKK - Jaringan Komputer dan Komunikasi</p>
       </center>
       </a>
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