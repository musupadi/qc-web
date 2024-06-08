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
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $total_products; ?></h3>
          <p>All Items Inputed</p>
        </div>
        <div class="icon">
          <i class="ion ion-cube"></i>
        </div>
        <a href="#" class="small-box-footer">-</a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3> <?php echo $total_load_products; ?></h3>
          <p>Total Loaded Product</p>
        </div>
        <div class="icon">
          <i class="ion-ios-box"></i>
        </div>
        <a href="#" class="small-box-footer">-</a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo number_format($average_accuracy, 2); ?>% </h3>
          <p>Average Accuracy In 1 Year</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer"> - </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $total_users; ?></h3>
          <p>Total Active Users</p>
        </div>
        <div class="icon">
          <i class="ion-android-people"></i>
        </div>
        <?php if ($user[0]->id_role == 1 || $user[0]->id_role == 2) { ?>
          <a href="<?= base_url('home/historyTransaction') ?>" class="small-box-footer"> - </a>
        <?php } else { ?>
          <a href="#" class="small-box-footer"> - </a>
        <?php } ?>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <div class="row">
    <div class="col-lg-12">
      <!-- small box -->
      <div id="chart_div" style="height: 700px"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <!-- small box -->
      <div id="sales_chart" style="height: 700px"></div>
    </div>
  </div>
  <script>
    // Inisialisasi Google Charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawVisualization);
    google.charts.setOnLoadCallback(drawChart);

    function drawVisualization() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Month');
      data.addColumn('number', 'Actual');
      data.addColumn('number', 'Forecast');
      data.addColumn('number', 'Accuracy');
      data.addRows([
        ['Jan <?php echo $accuracy[0]; ?>%', <?php echo $production[0]; ?>, <?php echo $forecast[0]; ?>, <?php echo $hit[0]; ?>],
        ['Feb <?php echo $accuracy[1]; ?>%', <?php echo $production[1]; ?>, <?php echo $forecast[1]; ?>, <?php echo $hit[1]; ?>],
        ['Mar <?php echo $accuracy[2]; ?>%', <?php echo $production[2]; ?>, <?php echo $forecast[2]; ?>, <?php echo $hit[2]; ?>],
        ['Apr <?php echo $accuracy[3]; ?>%', <?php echo $production[3]; ?>, <?php echo $forecast[3]; ?>, <?php echo $hit[3]; ?>],
        ['May <?php echo $accuracy[4]; ?>%', <?php echo $production[4]; ?>, <?php echo $forecast[4]; ?>, <?php echo $hit[4]; ?>],
        ['Jun <?php echo $accuracy[5]; ?>%', <?php echo $production[5]; ?>, <?php echo $forecast[5]; ?>, <?php echo $hit[5]; ?>],
        ['Jul <?php echo $accuracy[6]; ?>%', <?php echo $production[6]; ?>, <?php echo $forecast[6]; ?>, <?php echo $hit[6]; ?>],
        ['Aug <?php echo $accuracy[7]; ?>%', <?php echo $production[7]; ?>, <?php echo $forecast[7]; ?>, <?php echo $hit[7]; ?>],
        ['Sep <?php echo $accuracy[8]; ?>%', <?php echo $production[8]; ?>, <?php echo $forecast[8]; ?>, <?php echo $hit[8]; ?>],
        ['Oct <?php echo $accuracy[9]; ?>%', <?php echo $production[9]; ?>, <?php echo $forecast[9]; ?>, <?php echo $hit[9]; ?>],
        ['Nov <?php echo $accuracy[10]; ?>%', <?php echo $production[10]; ?>, <?php echo $forecast[10]; ?>, <?php echo $hit[10]; ?>],
        ['Dec <?php echo $accuracy[11]; ?>%', <?php echo $production[11]; ?>, <?php echo $forecast[11]; ?>, <?php echo $hit[11]; ?>]
      ]);

      var options = {
        title: 'All Actual Forecast And Actual 2024',
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

    function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Month');
      data.addColumn('number', 'Incoming Raw Material');
      data.addColumn('number', 'Expired Raw Material');
      data.addRows([
        ['Jan', <?php echo $incoming[0]; ?>, <?php echo $exp[0]; ?>],
        ['Feb', <?php echo $incoming[1]; ?>, <?php echo $exp[1]; ?>],
        ['Mar', <?php echo $incoming[2]; ?>, <?php echo $exp[2]; ?>],
        ['Apr', <?php echo $incoming[3]; ?>, <?php echo $exp[3]; ?>],
        ['May', <?php echo $incoming[4]; ?>, <?php echo $exp[4]; ?>],
        ['Jun', <?php echo $incoming[5]; ?>, <?php echo $exp[5]; ?>],
        ['Jul', <?php echo $incoming[6]; ?>, <?php echo $exp[6]; ?>],
        ['Aug', <?php echo $incoming[7]; ?>, <?php echo $exp[7]; ?>],
        ['Sep', <?php echo $incoming[8]; ?>, <?php echo $exp[8]; ?>],
        ['Oct', <?php echo $incoming[9]; ?>, <?php echo $exp[9]; ?>],
        ['Nov', <?php echo $incoming[10]; ?>, <?php echo $exp[10]; ?>],
        ['Dec', <?php echo $incoming[11]; ?>, <?php echo $exp[11]; ?>]
      ]);

      var options = {
        title: 'All Incoming Raw Material 2024',
        curveType: 'function',
        seriesType: 'bars',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('sales_chart'));
      chart.draw(data, options);
    }
  </script>
</section>
<!-- /.content -->
