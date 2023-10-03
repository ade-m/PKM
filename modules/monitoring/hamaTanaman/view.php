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
        <h1>Monitoring Hama pada Tanaman</h1>
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
            <div class="row">

              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th class="center">Tanggal</th>
                          <th class="center">Waktu</th>
                          <th class="center">Foto Pendeteksian</th>
                          <th class="center">Jumlah Hama</th>
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
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
</section>

<script>
  let buttonPesticide = false;

  // buttonPompa
  $('#buttonPesticide').click(function() {
    buttonPesticide = !buttonPesticide;
    //On
    if (buttonPesticide) {
      $('#insecticidePng').attr("hidden", true);
      $('#insecticideGif').attr("hidden", false);
    }
    //Off
    else {
      $('#insecticidePng').attr("hidden", false);
      $('#insecticideGif').attr("hidden", true);
    }
  })
</script>