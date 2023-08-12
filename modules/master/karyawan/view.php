<section class="content-header">
      <div class="container-fluid">
      <?php
        if (isset($_GET['alert'])) {
          $alert =  $_GET['alert'];
          switchAlert($alert);
          }

          $tgl = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : date("Y-m-d");
?>
        <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Data Karyawan</h1>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

<?php
  $query = "CALL tidak_hadir ('2023-07-03');";
  $execQuery = mysqli_query($conn, $query)
               or die('Ada kesalahan pada query tampil data user: '.mysqli_error($conn));;
?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                    <div class="row">
                        <div class="col-3">
                            <label>Tanggal</label>
                        </div>
                    </div>
                    <form action="modules/master/absentelat/proses.php?act=caritanggal" method="post">
                        <div class="row mt-2">
                                <div class="col-3">
                                    <input type="date" name="tanggal_awal" placeholder="tanggal_awal" class="form-control" required>
                                </div>
                                <div class="col-3 mt-1">
                                    <button type="submit" class="btn btn-primary btn-sm" name="caritanggal"><i class = "fas fa-search"></i></button>
                                </div>
                        </div>
                    </form>
                    
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="center">No.</th>
                    <th class="center">Nama</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_assoc($execQuery)){
                        $userid = $data['userid'];
                    ?>
                      <tr>
                      <td><?=$i;?></td>
                      <td><?=$data['nama']?></td>
                      </tr>
                    <?php
                    $i++;
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