<?php require_once('Connections/Labformatic.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['user'])) {
  $loginUsername=$_POST['user'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "data/home.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_Labformatic, $Labformatic);
  
  $LoginRS__query=sprintf("SELECT username, password FROM `admin` WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $Labformatic) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="asset/login/css/style.css">
    <link rel="stylesheet" href="asset/login/css/style.css">
    <link rel="icon" type="image/png" href="img/Logo Yarsi.png";/>
    <!-- Add the script to the HEAD of your document -->
<script language="javascript">
<!-- Begin
var scrl = " Selamat Datang di Labformatic || ";
function scrlsts() {
 scrl = scrl.substring(1, scrl.length) + scrl.substring(0, 1);
 document.title = scrl;
 setTimeout("scrlsts()", 250);
 }
//  End -->
</script>

<script type="text/javascript">
  function updateClock (){
    var currentTime = new Date ( );
    var currentHours = currentTime.getHours ();
    var currentMinutes = currentTime.getMinutes ();
    var currentSeconds = currentTime.getSeconds ();
    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
    currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
    var timeOfDay;
  if(currentHours >= 3 && currentHours < 10){
  timeOfDay="Pagi";}
  else if(currentHours >= 10 && currentHours < 15){
  timeOfDay="Siang";}
  else if(currentHours >= 15 && currentHours <=17){
  timeOfDay="Sore";}  
  else if(currentHours > 17){
  timeOfDay="Malam";} 
    var currentTimeString = "Pukul " + currentHours + ":" + currentMinutes + " "+ timeOfDay;
    document.getElementById("clock").firstChild.nodeValue = currentTimeString;
}
</script>


<!-- Add the event loader to the body tag as below -->
</head>
<body onload="updateClock(); setInterval('updateClock()', 1000 );scrlsts();">

    <div class="container">
  <div class="login">
  	<h1 style="letter-spacing: -2px;" class="login-heading">
      <strong>Selamat Datang di Labformatic // </strong>
      <br/>
      <strong>Admin Login</strong>
      </h1>
      <a class="lnk">          
             <br/>
             <h id="hari_tanggal">
           <script type="text/javascript">
        var currentTimes = new Date()
        var bulan = currentTimes.getMonth()+1
        var day = currentTimes.getDate()
        var year = currentTimes.getFullYear()
        if(bulan == 1){
        bulan = "Januari";
        }
        else if(bulan == 2){
        bulan = "Februari";
        }
        else if(bulan == 3){
        bulan = "Maret";
        }
        else if(bulan == 4){
        bulan = "April";
        }
        else if(bulan == 5){
        bulan = "Mei";
        }
        else if(bulan == 6){
        bulan = "Juni ";
        }
        else if(bulan == 7){
        bulan = "Juli";
        }
        else if(bulan == 8){
        bulan = "Agustus";
        }
        else if(bulan == 9){
        bulan = "September";
        }
        else if(bulan == 10){
        bulan = "Oktober";
        }
        else if(bulan == 11){
        bulan = "November";
        }
        else if(bulan == 12){
        bulan = "Desember";
        }
      document.write(day + " " + bulan + " " + year)
      </script>
      - - - -
      <h id="clock">&nbsp;</h>
  </h>
  </a>
      <form ACTION="<?php echo $loginFormAction; ?>" style="margin-top:4px;" method="POST" name="loginadmin">
        <input type="text" name="user" placeholder="Masukan username anda" required class="input-txt" />
          <input type="password" name="password" placeholder="Masukan password anda" required class="input-txt" />
          <div class="login-footer">      
            <button style="float: right;" type="submit" class="btn btn--right">Sign in  </button>
          </div>
      </form>
  </div>
 
</div>
   <center>
   <div class="footercopyright">Copyright &copy; 2016 Midnight</div>  
   </center>
<script src="css/login/js/index.js"></script>  
</body>
</html>
