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
        <h1>Monitoring Nutrisi Tanaman</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
  $query = "SELECT * from log ORDER BY id ASC";
  $execQuery = mysqli_query($conn, $query)
               or die('Ada kesalahan pada query tampil data user: '.mysqli_error($conn));;
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
                    <i class="fas fa-seedling"></i>
                    Nutrisi (<?= date("d F Y") ?>)
                  </h3>  
                </div>
                <div class="col-12">
                  <!-- tds Chart -->
                  <div class="chart tab-pane active" id="chart-4"
                    style="position: relative; height: 300px;">
                    <canvas id="tdsChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
                      <i class="fa fa-plus-square"></i> Tabel Nutrisi
                  </button>
                  
                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#myModal">
                      <i class="fa fa-plus-square"></i> Tambahkan Nutrisi
                  </button>
          </div> -->
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tdsTable" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Tanggal</th>
                <th class="center">Waktu</th>
                <th class="center">Nutrisi</th>
                <th class="center">Tindak Lanjut</th>
              </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($execQuery)){
                  list($date, $time) = explode(' ', $data['date']);
                ?>
                  <tr>
                    <td><?= $data['id']?></td>
                    <td><?= $date?></td>
                    <td><?= $time?></td>
                    <td><?= $data['tds']?></td>
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
  $("#tdsTable").DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    "order": [
      [0, 'desc']
    ]
  }).buttons().container().appendTo('#tdsTable_wrapper .col-md-6:eq(0)');

  // Function to fetch data from the server using AJAX
  function fetchData() {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var dataFromDatabase = JSON.parse(xhr.responseText);
        updateTdsTable(dataFromDatabase);
      }
    };
    xhr.open('GET', 'api/table/tdsData.php', true);
    xhr.send();
  }

  var tdsTable = $('#tdsTable').DataTable();

  function updateTdsTable(data) {
    data = data.map(x => {
      var [date, time] = x.date.split(' ');
      var action = x.tds > 1200 ? 'Beri Nutrisi B' : x.tds < 1000 ? 'Beri Nutrisi A' : '-'
      return [
        x.id,
        date,
        time,
        x.tds + ' PPM',
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