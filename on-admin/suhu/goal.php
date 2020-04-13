<?php include "header.php";?>
<!-- Begin page content -->
<div class="container">
  <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><center>Log Mesin Suhu</h3>
    </div>
    
    <?php
    if(isset($_GET['sdate']) || isset($_GET['edate']))
    {
      
      $sdate = $_GET['sdate'];
      $edate = $_GET['edate'];	
      $sqlAdmin = mysqli_query($koneksi, "SELECT data_id,data_tanggal,data_waktu,data_nilai FROM tb_data_suhu WHERE data_tanggal BETWEEN ' $sdate ' AND ' $edate ' ORDER BY ID DESC LIMIT 0,100");
    }
    else
    {
      $sqlAdmin = mysqli_query($koneksi, "SELECT data_id,data_tanggal,data_waktu,data_nilai FROM tb_data_suhu ORDER BY ID DESC LIMIT 0,100");
    }
    ?>

    <div class="panel-body">
      <form class="form-horizontal" method="GET">  
        <div class="form-group">
          <label class="col-md-2">Dari tanggal</label>   
          <div class="col-md-2">
            <input type="date" name="sdate" class="form-control" value="<?php echo $sdate; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2">sampai tanggal</label>   
          <div class="col-md-2">
            <input type="date" name="edate" class="form-control" value="<?php echo $edate; ?>" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2"></label>   
          <div class="col-md-8">
            <input type="submit" class="btn btn-primary" value="Filter">
            <a href='goal.php'  class='btn btn-warning btn-sm'>Reset</a>
          </div>
        </div>
      </form>

      <table class="table table-bordered table-striped">
        <thead>
          <tr >
            <th class='text-center'>Jam</th>
            <th class='text-center'>Suhu</th>
            <th class='text-center'>Tanggal</th>    
          </tr>
        </thead>
        <tbody>
          <?php

            $sqlAdmin = mysqli_query($koneksi, "SELECT data_waktu,data_nilai,data_tanggal FROM tb_data_suhu  ORDER BY ID DESC LIMIT 0,20");
            while($data=mysqli_fetch_array($sqlAdmin))
            {
              echo "<tr >
                <td><center>$data[data_waktu]</center></td> 
                <td><center>$data[data_nilai]</td>
                <td><center>$data[data_tanggal]</td>
              </tr>";
              
              
            }
          ?>
        </tbody>
      </table> 
    </div>
  </div>
</div>
<?php include "footer.php"; ?>