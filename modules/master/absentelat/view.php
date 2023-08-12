<section class="content-header">
      <div class="container-fluid">
      <?php
        if (isset($_GET['alert'])) {
          $alert =  $_GET['alert'];
          switchAlert($alert);
          }

          $tgl_awal = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : date("Y-m-d");
          $tgl_akhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : date("Y-m-d");
    

?>
        <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Absensi Telat</h1>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

<?php
  $query = "SELECT userid, nama, SUM(telat) AS total_telat
            FROM tabel_telat
            WHERE telat = '1' AND TIME(jam) < '09:00:00' and date(jam) >=  '$tgl_awal' and date(jam) <=  '$tgl_akhir'
            GROUP BY userid ORDER BY total_telat desc;";
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
                            <label>Tanggal Awal</label>
                        </div>
                        <div class="col-1 mt-2" style="display: flex; justify-content: center;">    
                        </div>
                        <div class="col-3">
                            <label>Tanggal Akhir</label>
                        </div>
                    </div>
                    <form action="modules/master/absentelat/proses.php?act=caritanggal" method="post">
                        <div class="row mt-2">
                                <div class="col-3">
                                    <input type="date" name="tanggal_awal" placeholder="tanggal_awal" class="form-control" required>
                                </div>
                                <div class="col-1 mt-2" style="display: flex; justify-content: center;">
                                    -
                                </div>
                                <div class="col-3">
                                    <input type="date" name="tanggal_akhir" placeholder="tanggal_akhir" class="form-control" required>
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
                    <th class="center">Telat</th>
                    <th class="center">Action</th>
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
                      <td><?=$data['total_telat']?></td>
                      <td>
                        <a href="?module=detailTelat&userid=<?=$userid?>&tgl_awal=<?=$tgl_awal?>&tgl_akhir=<?=$tgl_akhir?>">
                        <button type="button" class="btn btn-danger btn-sm">
                            <i class="fas fa-history" style="color : #ffffff"></i>
                        </button>
                        </a>
                      </td>
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