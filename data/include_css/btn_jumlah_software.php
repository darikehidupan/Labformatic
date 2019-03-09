<div class="row grid-divider">
<h2 style=" font-size: 17px;">&nbsp &nbsp &nbsp Jumlah Software Lab Praktikum &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Jumlah Data Inventaris Lab Praktikum</h2>
         <hr/>
         <div class="col-sm-5">
            <div class="col-padding">
          <p>
          <a id="btn-ahref" href="data_software_kc.php" class="btn btn-sq-lg btn-danger">
                <i class="fa fa-user fa-5x"></i><br/>
                Jumlah Software<br>
                Lab KC
                <br/>
                <?php 
                $result=mysql_query("SELECT count(*) as kc_soft from data_software_kc");
                $data=mysql_fetch_assoc($result);
                echo $data['kc_soft'];
                ?>            
            </a>
            <a id="btn-ahref" href="data_software_mdi.php" class="btn btn-sq-lg btn-primary">
                <i class="fa fa-user fa-5x"></i><br/>
                Jumlah Software<br>
                Lab MDI
                <br/>
                <?php 
                $result=mysql_query("SELECT count(*) as mdi_soft from data_software_mdi");
                $data=mysql_fetch_assoc($result);
                echo $data['mdi_soft'];
                ?>            
            </a>
             <a id="btn-ahref" href="data_software_jk.php" class="btn btn-sq-lg btn-info">
                <i class="fa fa-user fa-5x"></i><br/>
                Jumlah Software<br>
                Lab JK
                <br/>
                <?php 
                $result=mysql_query("SELECT count(*) as jk_soft from data_software_jk");
                $data=mysql_fetch_assoc($result);
                echo $data['jk_soft'];
                ?>            
            </a>
          </p>
            </div>
          </div>
           <div class="col-sm-5">
            <div class="col-padding">
          <p>
           <a id="btn-ahref" href="data_inventaris_kc.php" class="btn btn-sq-lg btn-danger">
                <i class="fa fa-user fa-5x"></i><br/>
                Total Inventaris<br>
                Lab KC
                <br/>
                <?php 
                $result=mysql_query("SELECT count(*) as kc_invent from data_inventaris_kc");
                $data=mysql_fetch_assoc($result);
                echo $data['kc_invent'];
                ?>            
            </a>
            <a id="btn-ahref" href="data_inventaris_mdi.php" class="btn btn-sq-lg btn-primary">
                <i class="fa fa-user fa-5x"></i><br/>
                Total Inventaris<br>
                Lab MDI
                <br/>
                <?php 
                $result=mysql_query("SELECT count(*) as mdi_invent from data_inventaris_mdi");
                $data=mysql_fetch_assoc($result);
                echo $data['mdi_invent'];
                ?>            
            </a>
             <a id="btn-ahref" href="data_inventaris_jk.php" class="btn btn-sq-lg btn-info">
                <i class="fa fa-user fa-5x"></i><br/>
                Total Inventaris<br>
                Lab JK
                <br/>
                <?php 
                $result=mysql_query("SELECT count(*) as jk_invent from data_inventaris_jk");
                $data=mysql_fetch_assoc($result);
                echo $data['jk_invent'];
                ?>            
            </a>
          </p>
            </div>
          </div>