<?php
session_start();
include 'config/database.php';
include 'function/alertfunc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once 'layout/head.php'
  ?>
</head>
<style>
  <?php
  require_once 'dist/css/customCss.css'
  ?>
</style>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #31845c">
      <?php
      require_once 'layout/navbar.php'
      ?>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-white elevation-4" style="background-color: #014625e2">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="dist/img/hydroguard_logo.png" width="40px" height="48px" style="margin-right: 10px;margin-left: 10px;">
        <span class="brand-text font-weight-bold">Hydro Guard</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <?php
        require_once 'layout/sidebar.php'
        ?>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color: #EDEEEE">

      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <?php
          include 'content/content.php'
          ?>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script src="plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- jquery-validation -->
  <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "order": [
          [0, 'desc']
        ]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $("#examplex").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      // Function to fetch data from the server using AJAX
      function fetchData() {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var dataFromDatabase = JSON.parse(xhr.responseText);
            updateChart(dataFromDatabase);
          }
        };
        xhr.open('GET', 'data.php', true);
        xhr.send();
      }

      // Function to update the chart with new data
      function updateChart(data) {
        console.log(data)

        const logData = data;
        const labels = data.map(item => item.date.split(' ')[1]);
        const tempValues = data.map(item => item.temperature);
        const humidValues = data.map(item => item.humidity);
        const phValues = data.map(item => item.ph);
        const tdsValues = data.map(item => item.tds);

        //for card at dashboard
        if ($("#latestTemp")) {
          $("#latestTemp").html(tempValues[tempValues.length - 1]);
        }
        if ($("#latestHumid")) {
          $("#latestHumid").html(humidValues[humidValues.length - 1]);
        }
        if ($("#latestPH")) {
          $("#latestPH").html(phValues[phValues.length - 1]);
        }
        if ($('#latestTds')) {
          var latestTds = tdsValues[tdsValues.length - 1]
          $("#latestTds").html(latestTds);

          if(latestTds > 1200 || latestTds < 1000) {
            $('#tdsWarning').attr("hidden", false);
          }
          else{
            $('#tdsWarning').attr("hidden", true);
          }
        }

        if (allCtx) {
          allChart.data.labels = labels;
          allChart.data.datasets[0].data = tempValues;
          allChart.data.datasets[1].data = humidValues;
          allChart.data.datasets[2].data = phValues;
          allChart.data.datasets[3].data = tdsValues;
          allChart.update();
        }

        if (tempCtx) {
          tempChart.data.labels = labels;
          tempChart.data.datasets[0].data = tempValues;
          tempChart.update();
        }

        if (humidCtx) {
          humidChart.data.labels = labels;
          humidChart.data.datasets[0].data = humidValues;
          humidChart.update();
        }

        if (phCtx) {
          phChart.data.labels = labels;
          phChart.data.datasets[0].data = phValues;
          phChart.update();
        }

        if (tdsCtx) {
          tdsChart.data.labels = labels;
          tdsChart.data.datasets[0].data = tdsValues;
          tdsChart.update();
        }
      }

      // Create the initial chart for All
      var allCtx = null;
      var allChart = null;
      if (document.getElementById('allChart') != null) {
        allCtx = document.getElementById('allChart').getContext('2d');
        allChart = new Chart(allCtx, {
          type: 'line',
          data: {
            labels: [],
            datasets: [{
                label: 'Suhu',
                data: [],
                borderColor: 'rgba(219, 4, 4)',
                borderWidth: 1,
                fill: false,
              },
              {
                label: 'Kelembapan',
                data: [],
                borderColor: 'rgba(250, 207, 22)',
                borderWidth: 1,
                fill: false,
              },
              {
                label: 'pH',
                data: [],
                borderColor: 'rgba(40, 4, 219)',
                borderWidth: 1,
                fill: false,
              },
              {
                label: 'Tds',
                data: [],
                borderColor: 'rgba(4, 219, 26)',
                borderWidth: 1,
                fill: false,
              },
            ]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              x: {
                type: 'time',
                time: {
                  unit: 'minute' // Display data in minute intervals
                }
              },
              y: {
                beginAtZero: true,
                maxTicksLimit: 1,
              }
            }
          }
        });
      }

      // Create the initial chart for Temperature
      var tempCtx = null;
      var tempChart = null;
      if (document.getElementById('tempChart') != null) {
        tempCtx = document.getElementById('tempChart').getContext('2d');
        tempChart = new Chart(tempCtx, {
          type: 'line',
          data: {
            labels: [],
            datasets: [{
              label: 'Suhu',
              data: [],
              borderColor: 'rgba(219, 4, 4)',
              borderWidth: 1,
              fill: false,
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              x: {
                type: 'time',
                time: {
                  unit: 'minute' // Display data in minute intervals
                }
              },
              y: {
                beginAtZero: true,
                maxTicksLimit: 1,
              }
            }
          }
        });
      }

      // Create the initial chart for Humidity
      var humidCtx = null;
      var humidChart = null;
      if (document.getElementById('humidChart') != null) {
        humidCtx = document.getElementById('humidChart').getContext('2d');
        humidChart = new Chart(humidCtx, {
          type: 'line',
          data: {
            labels: [],
            datasets: [{
              label: 'Kelembapan',
              data: [],
              borderColor: 'rgba(250, 207, 22)',
              borderWidth: 1,
              fill: false,
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              x: {
                type: 'time',
                time: {
                  unit: 'minute' // Display data in minute intervals
                }
              },
              y: {
                beginAtZero: true,
                maxTicksLimit: 1,
              }
            }
          }
        });
      }

      // Create the initial chart for pH
      var phCtx = null;
      var phChart = null;
      if (document.getElementById('phChart') != null) {
        phCtx = document.getElementById('phChart').getContext('2d');
        phChart = new Chart(phCtx, {
          type: 'line',
          data: {
            labels: [],
            datasets: [{
              label: 'pH',
              data: [],
              borderColor: 'rgba(40, 4, 219)',
              borderWidth: 1,
              fill: false,
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              x: {
                type: 'time',
                time: {
                  unit: 'minute' // Display data in minute intervals
                }
              },
              y: {
                beginAtZero: true,
                maxTicksLimit: 1,
              }
            }
          }
        });
      }

      // Create the initial chart for tds
      var tdsCtx = null;
      var tdsChart = null;
      if (document.getElementById('tdsChart') != null) {
        tdsCtx = document.getElementById('tdsChart').getContext('2d');
        tdsChart = new Chart(tdsCtx, {
          type: 'line',
          data: {
            labels: [],
            datasets: [{
              label: 'Nutrisi',
              data: [],
              borderColor: 'rgba(4, 219, 26)',
              borderWidth: 1,
              fill: false,
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              x: {
                type: 'time',
                time: {
                  unit: 'minute' // Display data in minute intervals
                }
              },
              y: {
                beginAtZero: true,
                maxTicksLimit: 1,
              }
            }
          }
        });
      }

      // Fetch data and update the chart every 5 seconds
      fetchData();
      setInterval(fetchData, 5000); // Set the refresh interval in milliseconds
    })
  </script>
</body>

</html>