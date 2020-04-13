<?php
include "koneksi.php";
?>

<?php
  $x_tanggal  = mysqli_query($koneksi, 'SELECT data_waktu FROM ( SELECT * FROM tb_data_produksi ORDER BY id DESC LIMIT 20) Var1 ORDER BY ID ASC');
  $y_metana   = mysqli_query($koneksi, 'SELECT data_nilai FROM ( SELECT * FROM tb_data_produksi  ORDER BY id DESC LIMIT 20) Var1 ORDER BY ID ASC');
  ?>

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><center>Grafik Persentase Produksi</h3>
    </div>

    <div class="panel-body">
      <canvas id="myChart"></canvas>
      <script>
       var canvas = document.getElementById('myChart');
        var data = {
            labels: [<?php while ($b = mysqli_fetch_array($x_tanggal)) { echo '"' . $b['data_waktu'] . '",';}?>],
            datasets: [
            {
                label: "BeadGromet",
                fill: true,
                lineTension: 0.1,
                backgroundColor: "rgba(105, 0, 132, .2)",
                borderColor: "rgba(200, 99, 132, .7)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(200, 99, 132, .7)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(200, 99, 132, .7)",
                pointHoverBorderColor: "rgba(200, 99, 132, .7)",
                pointHoverBorderWidth: 2,
                pointRadius: 5,
                pointHitRadius: 10,
                data: [<?php while ($b = mysqli_fetch_array($y_metana)) { echo  $b['data_nilai'] . ',';}?>],
            }
          
            ]
        };

        var option = 
        {
          showLines: true,
          animation: {duration: 0}
        };
        
        var myLineChart = Chart.Line(canvas,{
          data:data,
          options:option
        });

      </script>          
    </div>    
  </div>

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><center>Tabel Presentase Produksi</h3>
    </div>
    <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr >
            <th class='text-center'>Jam</th>
            <th class='text-center'>BeadGrommet</th>
            <th class='text-center'>Tanggal</th>
          </tr>
        </thead>
        
        <tbody>
          <?php

            $sqlAdmin = mysqli_query($koneksi, "SELECT data_waktu,data_nilai,data_tanggal FROM tb_data_produksi  ORDER BY ID DESC LIMIT 0,20");
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