<section class="content-header">
  <div class="container-fluid">
    <?php
    if (isset($_GET['alert'])) {
      $alert =  $_GET['alert'];
      switchAlert($alert);
    }
    ?>
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Monitoring Suhu Ruangan</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
$query = "SELECT * from is_users ORDER BY nama_user ASC";
$execQuery = mysqli_query($conn, $query)
  or die('Ada kesalahan pada query tampil data user: ' . mysqli_error($conn));;
?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="tab-content p-0">
              <div class="row">
                <div class="col-12">
                  <h3 class="card-title">
                    <i class="fas fa-temperature-high mr-1"></i>
                    Suhu (<?= date("d F Y") ?>)
                  </h3>
                </div>
                <div class="col-12">
                  <!-- Temperature Chart -->
                  <div class="chart tab-pane active" id="chart-1" style="position: relative; height: 300px;">
                    <canvas id="tempChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="card">
          <!-- <div class="card-header d-md-flex justify-content-md-end">
                      <button type="button" class="btn btn-outline-secondary mr-2" data-toggle="modal" data-target="#myModal">
                          <i class="fa fa-plus-square"></i> Tabel Suhu
                      </button>
                      
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal">
                          <i class="fa fa-plus-square"></i> Atur Suhu Ruangan
                      </button>
              </div> -->
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tempTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="center">No.</th>
                  <th class="center">Tanggal</th>
                  <th class="center">Waktu</th>
                  <th class="center">Suhu</th>
                  <th class="center">Tindak Lanjut</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($execQuery)) {
                  $id_user = $data['id_user'];
                ?>
                  <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                <?php
                }

                mysqli_close($conn);
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</section>

<script>
$(document).ready(function() {
  $("#tempTable").DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    "order": [
      [0, 'desc']
    ]
  }).buttons().container().appendTo('#tempTable_wrapper .col-md-6:eq(0)');

  // Function to fetch data from the server using AJAX
  function fetchData() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var dataFromDatabase = JSON.parse(xhr.responseText);
        updateTdsTable(dataFromDatabase);
      }
    };
    xhr.open('GET', 'api/table/tempData.php', true);
    xhr.send();
  }

  var tdsTable = $('#tempTable').DataTable();

  function updateTdsTable(data) {
    data = data.map(x => {
      var [date, time] = x.date.split(' ');
      var action = x.temperature > 30 ? 'Buka Fan' : '-';
      return [
        x.id,
        date,
        time,
        x.temperature + ' °C',
        action,
      ]
    })
    console.log(data)
    tdsTable.clear().rows.add(data).draw();
  }

  // Fetch data and update the chart every 5 seconds
  fetchData();
  setInterval(fetchData, 5000); // Set the refresh interval in milliseconds
})

</script>