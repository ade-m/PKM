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
        <h1>Action</h1>
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
      <!-- card pestisida -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="col-12 mb-5">
              <div class="row">
                <div class="col-12 d-flex justify-content-center">
                  <h4 class="fw-600">Semprot Pestisida</span>
                </div>
                <div class="col-12 mb-2 d-flex justify-content-center" style="height:150px">
                  <img id="sprinklerGif1" src="dist/gif/sprinkler.gif" alt="sprinkler" hidden>
                  <img id="sprinklerGif2" src="dist/gif/sprinkler.gif" alt="sprinkler" hidden>
                  <img id="sprinklerGif3" src="dist/gif/sprinkler.gif" alt="sprinkler" hidden>
                  
                  <img id="sprinklerPng1" src="dist/img/sprinkler.png" alt="sprinkler" class="mt-4" style="height: 70%">
                  <img id="sprinklerPng2" src="dist/img/sprinkler.png" alt="sprinkler" class="mt-4 mx-5" style="height: 70%">
                  <img id="sprinklerPng3" src="dist/img/sprinkler.png" alt="sprinkler" class="mt-4" style="height: 70%">
                </div>
                <div class="col-12 d-flex justify-content-center">
                  <button id="buttonSprinkler" type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                    <div class="handle"></div>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- card fan -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="col-12 mb-5">
              <div class="row">
                <div class="col-12 d-flex justify-content-center">
                  <h4 class="fw-600">Exhaust Fan</span>
                </div>
                <div class="col-12 mb-2 d-flex justify-content-center" style="height:150px">
                  <img id="fanGif" src="dist/gif/fan.gif" alt="fan" hidden>
                  <img id="fanPng" src="dist/img/fan.png" alt="fan" class="mt-4" style="height: 71%">
                </div>
                <div class="col-12 d-flex justify-content-center">
                  <button id="buttonFan" type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                    <div class="handle"></div>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- card kandungan air -->
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12 text-center mb-4">
                <h4 class="fw-600">Atur Kandungan Air</h4>
              </div>

              <div class="col-3">
                <div class="row">
                  <div class="col-12 mb-3 d-flex justify-content-center">
                    <span class="fw-600 fs-lg">pH Up</span>
                  </div>
                  <div class="col-12 d-flex justify-content-center">
                    <button id="button1" type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                      <div class="handle"></div>
                    </button>
                  </div>
                  <div class="col-12 mt-4 d-flex justify-content-center">
                    <img id="" width = "100px" height="100px" src="dist/img/water.png" alt="tap">
                  </div>
                  <div class="col-12 mt-3 d-flex justify-content-end" style="height:150px; padding-right: 2.1rem">
                    <img id="waterDrop1" src="dist/gif/waterFlow.gif" alt="water flow" hidden>
                  </div>
                </div>
              </div>

              <div class="col-3">
                <div class="row">
                  <div class="col-12 mb-3 d-flex justify-content-center">
                    <span class="fw-600 fs-lg">pH Down</span>
                  </div>
                  <div class="col-12 d-flex justify-content-center">
                    <button id="button2" type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                      <div class="handle"></div>
                    </button>
                  </div>
                  <div class="col-12 mt-4 d-flex justify-content-center">
                    <img id="" width = "100px" height="100px" src="dist/img/water.png" alt="tap">
                  </div>
                  <div class="col-12 mt-3 d-flex justify-content-end" style="height:150px; padding-right: 1.8rem">
                    <img id="waterDrop2" src="dist/gif/waterFlow.gif" alt="water flow" hidden>
                  </div>
                </div>
              </div>

              <div class="col-3">
                <div class="row">
                  <div class="col-12 mb-3 d-flex justify-content-center">
                    <span class="fw-600 fs-lg">Nutrisi A</span>
                  </div>
                  <div class="col-12 d-flex justify-content-center">
                    <button id="button3" type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                      <div class="handle"></div>
                    </button>
                  </div>
                  <div class="col-12 mt-4 d-flex justify-content-center">
                    <img id="" width = "100px" height="100px" src="dist/img/water.png" alt="tap">
                  </div>
                  <div class="col-12 mt-3 d-flex justify-content-end" style="height:150px; padding-right: 2.1rem">
                    <img id="waterDrop3" src="dist/gif/waterFlow.gif" alt="water flow" hidden>
                  </div>
                </div>
              </div>

              <div class="col-3">
                <div class="row">
                  <div class="col-12 mb-3 d-flex justify-content-center">
                    <span class="fw-600 fs-lg">Nutrisi B</span>
                  </div>
                  <div class="col-12 d-flex justify-content-center">
                    <button id="button4" type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
                      <div class="handle"></div>
                    </button>
                  </div>
                  <div class="col-12 mt-4 d-flex justify-content-center">
                    <img id="" width = "100px" height="100px" src="dist/img/water.png" alt="tap">
                  </div>
                  <div class="col-12 mt-3 d-flex justify-content-end" style="height:150px; padding-right: 2rem">
                    <img id="waterDrop4" src="dist/gif/waterFlow.gif" alt="water flow" hidden>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <!-- <div class="water-tank bg-primary p-5 mx-5"></div> -->
                <img id="" width="100%" height="250px" src="dist/gif/sea.gif" alt="water flow" >
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

<script>
  let buttonSprinkler = false;
  // button pesticide
  $('#buttonSprinkler').click(function() {
    buttonSprinkler = !buttonSprinkler;
    //On
    if (buttonSprinkler) {
      $('#sprinklerPng1').attr("hidden", true);
      $('#sprinklerPng2').attr("hidden", true);
      $('#sprinklerPng3').attr("hidden", true);
      $('#sprinklerGif1').attr("hidden", false);
      $('#sprinklerGif2').attr("hidden", false);
      $('#sprinklerGif3').attr("hidden", false);
    }
    //Off
    else {
      $('#sprinklerPng1').attr("hidden", false);
      $('#sprinklerPng2').attr("hidden", false);
      $('#sprinklerPng3').attr("hidden", false);
      $('#sprinklerGif1').attr("hidden", true);
      $('#sprinklerGif2').attr("hidden", true);
      $('#sprinklerGif3').attr("hidden", true);
    }
  })

  let buttonFan = false;
  // button pesticide
  $('#buttonFan').click(function() {
    buttonFan = !buttonFan;
    //On
    if (buttonFan) {
      $('#fanPng').attr("hidden", true);
      $('#fanGif').attr("hidden", false);
    }
    //Off
    else {
      $('#fanPng').attr("hidden", false);
      $('#fanGif').attr("hidden", true);
    }
  })

  let button1 = false;
  let button2 = false;
  let button3 = false;
  let button4 = false;
  // button 1
  $('#button1').click(function() {
    button1 = !button1;
    //On
    if (button1) {
      $('#waterDrop1').attr("hidden", false);
    }
    //Off
    else {
      $('#waterDrop1').attr("hidden", true);
    }
  })

  // button 2
  $('#button2').click(function() {
    button2 = !button2;
    //On
    if (button2) {
      $('#waterDrop2').attr("hidden", false);
    }
    //Off
    else {
      $('#waterDrop2').attr("hidden", true);
    }
  })

  // button 3
  $('#button3').click(function() {
    button3 = !button3;
    //On
    if (button3) {
      $('#waterDrop3').attr("hidden", false);
    }
    //Off
    else {
      $('#waterDrop3').attr("hidden", true);
    }
  })

  // button 4
  $('#button4').click(function() {
    button4 = !button4;
    //On
    if (button4) {
      $('#waterDrop4').attr("hidden", false);
    }
    //Off
    else {
      $('#waterDrop4').attr("hidden", true);
    }
  })
</script>