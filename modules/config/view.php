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
        <h1>Settings</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<?php
$kebun="";
$tanaman="";
$dPData=1;
$dPPH=1;
$dPPestisida=1;
$dPExhausFan=1;
$dPPpm=1;
$query = "SELECT * from config";
$execQuery = mysqli_query($conn, $query)
  or die('Ada kesalahan pada query tampil data user: ' . mysqli_error($conn));
  while ($data = mysqli_fetch_assoc($execQuery)) {
    $kebun=$data['kebun'];
    $tanaman=$data['tanaman'];
    $dPData=$data['dPData'];
    $dPPh=$data['dPPh'];
    $dPPestisida=$data['dPPestisida'];
    $dPExhausFan=$data['dPExhausFan'];
    $dPPpm=$data['dPPpm'];
  }
?>

<?php
  $query = "SELECT * from is_users ORDER BY nama_user ASC";
  $execQuery = mysqli_query($conn, $query)
               or die('Ada kesalahan pada query tampil data user: '.mysqli_error($conn));;
?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9 col-lg-7">
            <div class="card">
              <div class="card-body">
                <div class="tab-content p-0">
                <div class="row">
                    <div class="col-md-6">
                      <div class="row form-group">
                        <div class="col-12">
                          <label>Nama Kebun</label>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                          <input type="text" name="kebun" id="kebun" class="form-control mr-3" value="<?php echo $kebun; ?>"> 
                        </div>
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="row form-group">
                        <div class="col-12">
                          <label>Jenis Tanaman</label>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                          <input type="text"  name="tanaman" id="tanaman" class="form-control mr-3" value="<?php echo $tanaman; ?>"> 
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="row form-group">
                        <div class="col-12">
                          <label>Durasi Pengambilan Data</label>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                          <input type="number" class="form-control mr-3" value="<?php echo $dPData; ?>"> Detik
                        </div>
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="row form-group">
                        <div class="col-12">
                          <label>Durasi Pembukaan Pestisida</label>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                          <input type="number" class="form-control mr-3" value="<?php echo $dPPestisida; ?>"> Menit
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row form-group">
                        <div class="col-12">
                          <label>Durasi Pembukaan Katup pH</label>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                          <input type="number" class="form-control mr-3" value="<?php echo $dPPh; ?>"> Detik
                        </div>
                      </div>
                    </div>
   
                    <div class="col-md-6">
                      <div class="row form-group">
                        <div class="col-12">
                          <label>Durasi Pembukaan Exhaust Fan</label>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                          <input type="number" class="form-control mr-3" value="<?php echo $dPExhausFan; ?>"> Menit
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="row form-group">
                        <div class="col-12">
                          <label>Durasi Pembukaan Katup Nutrisi</label>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                          <input type="number" class="form-control mr-3" value="<?php echo $dPPpm; ?>"> Detik
                        </div>
                      </div>
                    </div>

                    <div class="d-flex align-items-center col-md-6 mt-3">
                      <button type="button" class="btn btn-success">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


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
        <h1>Tabel pH dan PPM Tanaman</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<?php
$query = "SELECT * from configSayur";
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
                          <th class="center">id</th>
                          <th class="center">Nama Sayuran</th>
                          <th class="center">pH</th>
                          <th class="center">PPM</th>
                          <th class="center">Gambar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($data = mysqli_fetch_assoc($execQuery)) {
                          //$id_user = $data['id_user'];
                          echo "<tr>
                                <td>".$data['id']."</td>
                                <td>".$data['NamaSayur']."</td>
                                <td>".$data['phBawah']."-".$data['phAtas']."</td>
                                <td>".$data['ppmBawah']."-".$data['ppmAtas']."</td>
                                <td>".$data['gambar']."</td>
                              </tr>";
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