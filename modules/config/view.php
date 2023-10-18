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
                          <label>Durasi Insert Data</label>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                          <input type="number" class="form-control mr-3" value="5"> Detik
                        </div>
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="row form-group">
                        <div class="col-12">
                          <label>Durasi Pembukaan Pompa</label>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                          <input type="number" class="form-control mr-3" value="1"> Menit
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row form-group">
                        <div class="col-12">
                          <label>Durasi Pembukaan pH</label>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                          <input type="number" class="form-control mr-3" value="10"> Menit
                        </div>
                      </div>
                    </div>
   
                    <div class="col-md-6">
                      <div class="row form-group">
                        <div class="col-12">
                          <label>Durasi Pembukaan Exhaust Fan</label>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                          <input type="number" class="form-control mr-3" value="30"> Menit
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="row form-group">
                        <div class="col-12">
                          <label>Durasi Pembukaan Nutrisi</label>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                          <input type="number" class="form-control mr-3" value="10"> Menit
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