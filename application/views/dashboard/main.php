<section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>0</h3>

              <p>All Items</p>
            </div>
            <div class="icon">
              <i class="ion ion-cube"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>0</h3>

              <p>Transaction In & Out</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>0</h3>

              <p>Transaction In</p>
            </div>
            <div class="icon">
              <i class="fa fa-sign-in"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>0</h3>

              <p>Transaction Out</p>
            </div>
            <div class="icon">
              <i class="fa fa-sign-out"></i>
            </div>
            <?php if ( $user[0]->id_role == 1 || $user[0]->id_role == 2 ) { ?>
              <a href="<?= base_url('home/historyTransaction') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <?php } else { ?>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            <?php } ?>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row">
        <div class="col-lg-12 col-xs-6">
            <!-- small box -->
              <div id="sales_chart" style="height: 700px">
        </div>
      </div>
      <script>
        // Inisialisasi Google Charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Fungsi untuk menggambar grafik
        function drawChart() {
            // Data produksi dan ramalan dari controller
            var production = '<?php echo $production[0]; ?>';
            var forecast = '<?php echo $forecast[0]; ?>';
            console.log(production);
            // Buat data table
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Month');
            data.addColumn('number', 'Production');
            data.addColumn('number', 'Forecast');
            data.addRows([
                ['Jan',<?php echo $production[0]; ?>, <?php echo $forecast[0]; ?>],
                ['Feb',<?php echo $production[1]; ?>, <?php echo $forecast[1]; ?>],
                ['Mar',<?php echo $production[2]; ?>, <?php echo $forecast[2]; ?>],
                ['Apr',<?php echo $production[3]; ?>, <?php echo $forecast[3]; ?>],
                ['May',<?php echo $production[4]; ?>, <?php echo $forecast[4]; ?>],
                ['Jun',<?php echo $production[5]; ?>, <?php echo $forecast[5]; ?>],
                ['Jul',<?php echo $production[6]; ?>, <?php echo $forecast[6]; ?>],
                ['Aug',<?php echo $production[7]; ?>, <?php echo $forecast[7]; ?>],
                ['Sep',<?php echo $production[8]; ?>, <?php echo $forecast[8]; ?>],
                ['Oct',<?php echo $production[9]; ?>, <?php echo $forecast[9]; ?>],
                ['Nov',<?php echo $production[10]; ?>, <?php echo $forecast[10]; ?>],
                ['Des',<?php echo $production[11]; ?>, <?php echo $forecast[11]; ?>]
            ]);

            // Set opsi chart
            var options = {
                title: 'All Production and Forecast 2024',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            // Gambar grafik menggunakan LineChart
            var chart = new google.visualization.LineChart(document.getElementById('sales_chart'));
            chart.draw(data, options);
        }
    </script>
 


     
     



      <!-- /.row -->
      <!-- Main row -->
     
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
    

        
