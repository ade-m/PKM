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
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="tab-content p-0">
                  <div class="row">
                    <div class="col-sm-5 col-md-3">
                      <div class="form-group">
                        <label>Durasi Insert Data</label>
                        <input type="insertData" class="form-control">
                      </div>
                    </div>
                    <div class="col-1">
                      
                    </div>
                    <div class="col-sm-5 col-md-3">
                      <div class="form-group">
                        <label>Durasi Pembukaan Pompa</label>
                        <input type="insertData" class="form-control">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-5 col-md-3">
                      <div class="form-group">
                        <label>Durasi Pembukaan Ph</label>
                        <input type="insertData" class="form-control">
                      </div>
                    </div>
                    <div class="col-1">
                      
                    </div>
                    <div class="col-sm-5 col-md-3">
                      <div class="form-group">
                        <label>Durasi Pembukaan Exhaust Fan</label>
                        <input type="insertData" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-5 col-md-3">
                      <div class="form-group">
                        <label>Durasi Pembukaan Nutrisi</label>
                        <input type="insertData" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->