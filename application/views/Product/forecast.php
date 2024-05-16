<section class="content-header">
      <h1>
        Forecast : <?php echo $product[0]->label; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Product</a></li>
        <li class="active">Forecast</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12">
            <!-- small box -->
              <div id="chart_div" style="height: 700px">
        </div>
      </div>
      <script>
        // Inisialisasi Google Charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawVisualization);



        function drawVisualization() {
        // Some raw data (not necessarily accurate)
            var production = '<?php echo $production[0]; ?>';
            var forecast = '<?php echo $forecast[0]; ?>';
            var accuracy = '<?php echo $accuracy[0]; ?>';
            console.log(production);
            // Buat data table
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Month');
            data.addColumn('number', 'Actual');
            data.addColumn('number', 'Forecast');
            data.addColumn('number', 'Accuracy');
            data.addRows([
                ['Jan <?php echo $accuracy[0]; ?>%',<?php echo $production[0]; ?>, <?php echo $forecast[0]; ?>, <?php echo $hit[0]; ?>],
                ['Feb <?php echo $accuracy[1]; ?>%',<?php echo $production[1]; ?>, <?php echo $forecast[1]; ?>, <?php echo $hit[1]; ?>],
                ['Mar <?php echo $accuracy[2]; ?>%',<?php echo $production[2]; ?>, <?php echo $forecast[2]; ?>, <?php echo $hit[2]; ?>],
                ['Apr <?php echo $accuracy[3]; ?>%',<?php echo $production[3]; ?>, <?php echo $forecast[3]; ?>, <?php echo $hit[3]; ?>],
                ['May <?php echo $accuracy[4]; ?>%',<?php echo $production[4]; ?>, <?php echo $forecast[4]; ?>, <?php echo $hit[4]; ?>],
                ['Jun <?php echo $accuracy[5]; ?>%',<?php echo $production[5]; ?>, <?php echo $forecast[5]; ?>, <?php echo $hit[5]; ?>],
                ['Jul <?php echo $accuracy[6]; ?>%',<?php echo $production[6]; ?>, <?php echo $forecast[6]; ?>, <?php echo $hit[6]; ?>],
                ['Aug <?php echo $accuracy[7]; ?>%',<?php echo $production[7]; ?>, <?php echo $forecast[7]; ?>, <?php echo $hit[7]; ?>],
                ['Sep <?php echo $accuracy[8]; ?>%',<?php echo $production[8]; ?>, <?php echo $forecast[8]; ?>, <?php echo $hit[8]; ?>],
                ['Oct <?php echo $accuracy[9]; ?>%',<?php echo $production[9]; ?>, <?php echo $forecast[9]; ?>, <?php echo $hit[9]; ?>],
                ['Nov <?php echo $accuracy[10]; ?>%',<?php echo $production[10]; ?>, <?php echo $forecast[10]; ?>, <?php echo $hit[10]; ?>],
                ['Des <?php echo $accuracy[11]; ?>%',<?php echo $production[11]; ?>, <?php echo $forecast[11]; ?>, <?php echo $hit[11]; ?>]
            ]);

        var options = {
          title: '<?php echo $product[0]->label; ?> Actual Forecast And Actual 2024',
          vAxis: {title: 'Actual'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {
            1: {type: 'line'},
            2: {type: 'line'}
          }
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
        
        // Fungsi untuk menggambar grafik
        function drawChart() {
            // Data produksi dan ramalan dari controller
            var production = '<?php echo $production[0]; ?>';
            var forecast = '<?php echo $forecast[0]; ?>';
            console.log(production);
            // Buat data table
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Month');
            data.addColumn('number', 'Actual');
            data.addColumn('number', 'Forecast');
            data.addColumn('number', 'Accuracy');
            data.addRows([
                ['Jan',<?php echo $production[0]; ?>, <?php echo $forecast[0]; ?>, <?php echo $forecast[0]; ?>],
                ['Feb',<?php echo $production[1]; ?>, <?php echo $forecast[1]; ?>, <?php echo $forecast[0]; ?>],
                ['Mar',<?php echo $production[2]; ?>, <?php echo $forecast[2]; ?>, <?php echo $forecast[0]; ?>],
                ['Apr',<?php echo $production[3]; ?>, <?php echo $forecast[3]; ?>, <?php echo $forecast[0]; ?>],
                ['May',<?php echo $production[4]; ?>, <?php echo $forecast[4]; ?>, <?php echo $forecast[0]; ?>],
                ['Jun',<?php echo $production[5]; ?>, <?php echo $forecast[5]; ?>, <?php echo $forecast[0]; ?>],
                ['Jul',<?php echo $production[6]; ?>, <?php echo $forecast[6]; ?>, <?php echo $forecast[0]; ?>],
                ['Aug',<?php echo $production[7]; ?>, <?php echo $forecast[7]; ?>, <?php echo $forecast[0]; ?>],
                ['Sep',<?php echo $production[8]; ?>, <?php echo $forecast[8]; ?>, <?php echo $forecast[0]; ?>],
                ['Oct',<?php echo $production[9]; ?>, <?php echo $forecast[9]; ?>, <?php echo $forecast[0]; ?>],
                ['Nov',<?php echo $production[10]; ?>, <?php echo $forecast[10]; ?>, <?php echo $forecast[0]; ?>],
                ['Des',<?php echo $production[11]; ?>, <?php echo $forecast[11]; ?>, <?php echo $forecast[0]; ?>]
            ]);

            // Set opsi chart
            var options = {
                title: '<?php echo $product[0]->label; ?> Actual Forecast And Accuracy 2024',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            // Gambar grafik menggunakan LineChart
            var chart = new google.visualization.ColumnChart(document.getElementById('sales_chart'));
            chart.draw(data, options);
        }
    </script>
 


     
     



      <!-- /.row -->
      <!-- Main row -->
     
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
    

        
