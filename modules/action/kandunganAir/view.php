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
        <h1>Mengatur Kandungan Air</h1>
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

              <div class="col-3">
                <div class="row">
                  <div class="col-12 mb-3 d-flex justify-content-center">
                    <span class="fw-600 fs-lg">pH Up</span>
                  </div>
                  <div class="col-12 d-flex justify-content-center">
                    <button type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                      <div class="handle"></div>
                    </button>
                  </div>
                </div>
              </div>

              <div class="col-3">
                <div class="row">
                  <div class="col-12 mb-3 d-flex justify-content-center">
                    <span class="fw-600 fs-lg">pH Down</span>
                  </div>
                  <div class="col-12 d-flex justify-content-center">
                    <button type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                      <div class="handle"></div>
                    </button>
                  </div>
                </div>
              </div>

              <div class="col-3">
                <div class="row">
                  <div class="col-12 mb-3 d-flex justify-content-center">
                    <span class="fw-600 fs-lg">Ab Mix</span>
                  </div>
                  <div class="col-12 d-flex justify-content-center">
                    <button type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                      <div class="handle"></div>
                    </button>
                  </div>
                </div>
              </div>

              <div class="col-3">
                <div class="row">
                  <div class="col-12 mb-3 d-flex justify-content-center">
                    <span class="fw-600 fs-lg">Ab apa la</span>
                  </div>
                  <div class="col-12 d-flex justify-content-center">
                    <button type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                      <div class="handle"></div>
                    </button>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
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
    <div class="modal fade" id="edit<?= $id_supplier; ?>">
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
  </div>
</section>