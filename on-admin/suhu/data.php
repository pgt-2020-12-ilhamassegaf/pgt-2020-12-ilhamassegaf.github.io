<?php
include "koneksi.php";
?>

<?php
  $x_tanggal  = mysqli_query($koneksi, 'SELECT data_waktu FROM ( SELECT * FROM tb_data_suhu ORDER BY id DESC LIMIT 20) Var1 ORDER BY ID ASC');
  $y_metana   = mysqli_query($koneksi, 'SELECT data_nilai FROM ( SELECT * FROM tb_data_suhu  ORDER BY id DESC LIMIT 20) Var1 ORDER BY ID ASC');
  ?>

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><center>Grafik Presentase Suhu</h3>
    </div>

    <div class="panel-body">
      <canvas id="myChart"></canvas>
      <script>
       var canvas = document.getElementById('myChart');
        var data = {
            labels: [<?php while ($b = mysqli_fetch_array($x_tanggal)) { echo '"' . $b['data_waktu'] . '",';}?>],
            datasets: [
            {label: "Suhu Mesin",
                fill: true,
                lineTension: 0.1,
                backgroundColor: "rgba(0, 137, 132, .2)",
                borderColor: "rgba(0, 10, 130, .7)",
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(0, 10, 130, .7)",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(0, 10, 130, .7)",
                pointHoverBorderColor: "rgba(0, 10, 130, .7)",
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
      <h3 class="panel-title"><center>Tabel Presentase Suhu Mesin</h3>
    </div>
    <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr >
            <th class='text-center'>Waktu</th>
            <th class='text-center'>Suhu Mesin</th>
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