<section class="content-header">
      <div class="container-fluid">
      <?php
        if (isset($_GET['alert'])) {
          $alert =  $_GET['alert'];
          switchAlert($alert);
          }
        if (isset($_GET['userid'])) {
        $userid =  $_GET['userid'];
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
  $query = "SELECT *
            FROM tabel_telat
            WHERE telat = '1' AND TIME(jam) < '09:00:00' and date(jam) >=  '$tgl_awal' and date(jam) <=  '$tgl_akhir'
            and userid = $userid;";
            
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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="center">No.</th>
                    <th class="center">Nama</th>
                    <th class="center">Tanggal</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_assoc($execQuery)){
                        $userid = $data['userid'];
                        $tanggal = date("d M Y - H:i",strtotime($data['jam']));
                    ?>
                      <tr>
                      <td><?=$i;?></td>
                      <td><?=$data['nama']?></td>
                      <td><?=$tanggal?></td>
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