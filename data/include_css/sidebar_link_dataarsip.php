<ul class="nav nav-pills nav-stacked">
       <li><a href="home.php">Homepage</a></li>
         <ul class="nav nav-pills nav-stacked left-menu" id="stacked-menu">
          <li class="active" data-toggle="collapse" data-target="#item1" data-parent="#stacked-menu" >
            <a>Arsip
            <span class="caret arrow"></span></a><li>
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
          </ul>
        <li><a href="jadwal.php">Jadwal Mata Kuliah</a></li>
        <ul class="nav nav-pills nav-stacked left-menu" id="stacked-menu">
          <li data-toggle="collapse" data-target="#item2" data-parent="#stacked-menu" >
            <a>Data Inventaris
            <span class="caret arrow"></span></a><li>
              <ul class="nav nav-stacked collapse left-submenu" id="item2">
                <li><a href="data_inventaris.php">---- Sub Data Inventaris</a></li>
                <li><a href="data_inventaris_KC.php">---- KC</a></li>
                <li><a href="data_inventaris_MDI.php">---- MDI</a></li>
                <li><a href="data_inventaris_JK.php">---- JK</a></li>
              </ul>        
          </ul>
          <ul class="nav nav-pills nav-stacked left-menu" id="stacked-menu">
          <li data-toggle="collapse" data-target="#item3" data-parent="#stacked-menu" >
            <a>Data Software
            <span class="caret arrow"></span></a><li>
              <ul class="nav nav-stacked collapse left-submenu" id="item3">
                <li><a href="data_software.php">---- Sub Data Software</a></li>
                <li><a href="data_software_KC.php">---- KC</a></li>
                <li><a href="data_software_MDI.php">---- MDI</a></li>
                <li><a href="data_software_JK.php">---- JK</a></li>
              </ul>        
          </ul>
                <li><a href="laporan_lab.php">Laporan Lab</a></li>
                <li><a href="laporan_mahasiswa.php">Laporan Mahasiswa</a></li>
      
      </ul>