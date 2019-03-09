<?php require_once('Connections/Labformatic.php'); ?>
<link rel="icon" type="image/png" href="img/Logo Yarsi.png";/>
<link rel="stylesheet" type="text/css" href="asset/bootstrap.css">
<link rel="stylesheet" type="text/css" href="asset/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="asset/mahasiswa/mahasiswa.css">
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="asset/js/jquery.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.js"></script>
<script type="text/javascript">
$(document).ready(function () {
window.setTimeout(function() {
    $("#gagal-alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 10000);
});
</script>
<script type="text/javascript">
$(document).ready(function () {
window.setTimeout(function() {
    $("#success-alert").fadeTo(1000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 10000);
});
</script>
<script type="text/javascript">
$(document).ready(function(){ 
    $('#characterLeft').text('200 karakter yang tersisa');
    $('#message').keydown(function () {
        var max = 200;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('Anda telah melewati batas karakter');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' karakter yang tersisa');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');            
        }
    });    
});  
</script>

<body>


            <?php
          if (!empty($_GET['status_error_data']) && $_GET['status_error_data'] == 'error'){
            echo '
            <center>
            <div class="alert alert-danger" id="gagal-alert" role="alert">
            Gagal Memberikan Feedback - Setiap Kolom Harus Terisi dan untuk Kolom Saran harus Terdapat 15 karakter
            </div>
            </center>';
          }
          ?>  
         <?php
          if (!empty($_GET['status_tambah_data']) && $_GET['status_tambah_data'] == 'success'){
          echo '
            <center>
            <div class="alert alert-success" id="success-alert" role="alert">
            Terima Kasih telah Memberikan Feedback
            </div>
            </center>';
          }
          ?>  
<div class="container center_div">
<div style="margin-left: 335px;" class="col-md-5 col-md-offset-3">
    <div class="form-area">  
        <form role="form" action="data/function/laporan_mahasiswa_tambah.php" method="post">
        <br style="clear:both">
                    <h3 style="margin-bottom:0px; margin-top: -5px; text-align: center;">Selamat Datang 
                    <br/> di halaman feedback & saran
                    <br/> Lab Praktikum - Universitas Yarsi
                    <hr>

                    </h3>
            <div class="form-group">
                <?php 
                //Koneksi database     
                mysql_connect("localhost","root","") or die(mysql_error());     
                mysql_select_db("labformatics") or die (mysql_error()); ?>  
                <input size="30" class="form-control"  type="text" list="nama_npm" 
                name="nama_npm" placeholder="Masukan NPM anda" required />                    
                <datalist id="nama_npm">
                <?php echo "<select>";     
                $myquery="select npm_nama from mahasiswa";     
                $daftar_kategori=mysql_query($myquery) or die (mysql_error());     
                while($dataku=mysql_fetch_object($daftar_kategori))     
                {         //perulangan menampilkan data         
                echo "<option>$dataku->npm_nama</option>";     
                }     
                echo "</select>"; ?>
                </datalist>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="Tanggal" placeholder="Tanggal Sekarang" readonly="readonly" required
            value=
            <?php
            date_default_timezone_set("Asia/Bangkok");
            $tgl=date('d-m-Y');
            echo $tgl;
            ?> 
            >
          </div>
          <div class="form-group">
             <input name="lab"  class="form-control" type="text" list="lab" 
                placeholder="Masukan Lokasi Lab Praktikum" required />
                <datalist id="lab">
                <option value="Lab Manajemen Data dan Informasi"></option>
                <option value="Lab Komputasional Cerdas"></option>
                <option value="Lab Jaringan Komputer dan Komunikasi"></option>  
                </datalist>
          </div>
          <div class="form-group">
             <input name="status"  class="form-control" type="text" list="status" 
                placeholder="Tingkat Kepuasan Anda" required />
                <datalist id="status">
                <option value="Puas"></option>
                <option value="Tidak Puas"></option>  
                </datalist>
          </div>

                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" name="keluhan" placeholder="Masukan Saran anda" maxlength="140" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
                    </div>
            
          <input type="submit" value="Kirimkan" class="btn btn-success">
        </form>
    </div>
</div>
</div>
<center>
   <div class="footercopyright">Copyright &copy; 2016 Midnight</div>  
   </center>
</body>
