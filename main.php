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
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <?php
    require_once 'layout/navbar.php'
  ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/machine.png" width="50px" height="50px" style="margin-right: 10px;margin-left: 10px;">
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
  <div class="content-wrapper">
    
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#examplex").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
        // Function to fetch data from the server using AJAX
        function fetchData() {
            var xhr = new XMLHttpRequest();
            console.log(xhr)
            xhr.onreadystatechange = function () {
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
            var labels = data.map(item => item.date);
            var tempValues = data.map(item => item.temperature);
            var humidValues = data.map(item => item.humidity);
            var phValues = data.map(item => item.ph);
            var tdsValues = data.map(item => item.tds);

            tempChart.data.labels = labels;
            tempChart.data.datasets[0].data = tempValues;
            tempChart.update();

            humidChart.data.labels = labels;
            humidChart.data.datasets[0].data = humidValues;
            humidChart.update();

            phChart.data.labels = labels;
            phChart.data.datasets[0].data = phValues;
            phChart.update();

            tdsChart.data.labels = labels;
            tdsChart.data.datasets[0].data = tdsValues;
            tdsChart.update();
        }

        // Create the initial chart for Temperature
        var tempCtx = document.getElementById('tempChart').getContext('2d');
        var tempChart = new Chart(tempCtx, {
          type: 'line',
          data: {
            labels: [],
            datasets: [{
              label: 'Suhu',
              data: [],
              borderColor: 'rgba(75, 192, 192, 1)',
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

        // Create the initial chart for Humidity
        var humidCtx = document.getElementById('humidChart').getContext('2d');
        var humidChart = new Chart(humidCtx, {
          type: 'line',
          data: {
            labels: [],
            datasets: [{
              label: 'Kelembapan',
              data: [],
              borderColor: 'rgba(30, 250, 30, 10)',
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

        // Create the initial chart for pH
        var phCtx = document.getElementById('phChart').getContext('2d');
        var phChart = new Chart(phCtx, {
          type: 'line',
          data: {
            labels: [],
            datasets: [{
              label: 'pH',
              data: [],
              borderColor: 'rgba(275, 42, 92, 30)',
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

        // Create the initial chart for tds
        var tdsCtx = document.getElementById('tdsChart').getContext('2d');
        var tdsChart = new Chart(tdsCtx, {
          type: 'line',
          data: {
            labels: [],
            datasets: [{
              label: 'Tds',
              data: [],
              borderColor: 'rgba(5, 12, 192, 100)',
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

        // Fetch data and update the chart every 5 seconds
        fetchData();
        setInterval(fetchData, 5000); // Set the refresh interval in milliseconds
    </script>
</body>
</html>
