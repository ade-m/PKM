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
                <table id="example1" class="table table-bordered table-striped">
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
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <br>
            <form action="modules/user/proses.php?act=insert" method="post" enctype="multipart/form-data">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control" required>
                <br>
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control" required>
                <br>
                <label>Nama User</label>
                <input type="text" name="nama_user" placeholder="User" class="form-control" required>
                <br>
                <label>Hak Akses</label>
                <select class="form-control" name="hakakses" placeholder="Hak Akses" required>
                  <option value="Super Admin">Super Admin</option> 
                  <option value="User">User</option> 
                </select>
                <br>
				    <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addUser" style="float: right;">Submit</button>
            </form> 
        </div>
      </div>
    </div>
  </div><!-- Modal Close -->
  
  
    <!-- The Modal -->
    <div class="modal fade" id="edit<?=$id_supplier;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <br>
            <form action="modules/user/proses.php?act=insert" method="post">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control" required>
                <br>
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control" required>
                <br>
                <label>Nama User</label>
                <input type="text" name="nama_user" placeholder="User" class="form-control" required>
                <br>
                <label>Hak Akses</label>
                <select class="form-control" name="hakakses" placeholder="Hak Akses" required>
                  <option value="Super Admin">Super Admin</option> 
                  <option value="User">User</option> 
                </select>
                <br>
				    <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addUser" style="float: right;">Submit</button>
            </form> 
        </div>
      </div>
    </div>
  </div><!-- Modal Close -->