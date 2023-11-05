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
                  <img id="sprinklerGif" src="dist/gif/sprinkler.gif" alt="sprinkler" hidden>
                  <img id="sprinklerPng" src="dist/img/sprinkler.png" alt="sprinkler" class="mt-4" style="height: 70%">
                </div>
                <div class="col-12 d-flex justify-content-center">
                  <button id="buttonPompa" data-endpoint="pompa" type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
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
                  <button id="buttonExhaustFan" data-endpoint="exhaustFan" type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
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
                    <button id="buttonPhUp" data-endpoint="phUp" type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
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
                    <button id="buttonPhDown" data-endpoint="phDown" type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
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
                    <button id="buttonNutrisiA" data-endpoint="nutrisiA" type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
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
                    <button id="buttonNutrisiB" data-endpoint="nutrisiB" type="button" class="btn btn-toggle" data-toggle="button" aria-pressed="false" autocomplete="off">
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
  </div>
</section>

<script>
  $(document).ready(function() {
    function fetchData() {
      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var dataFromDatabase = JSON.parse(xhr.responseText);
          getDeviceStatus(dataFromDatabase);
        }
      };
      xhr.open('GET', 'api/dashboard/getDeviceStatus.php', true);
      xhr.send();
    }

    function handleStatus(status, buttonId, offImg, onImg) {
      if (status === '0') {
        if($(buttonId).prop('ariaPressed') == 'true') {
          $(buttonId).click();
        }
        if (offImg) {
          $(offImg).attr("hidden", false);
        }
        $(onImg).attr("hidden", true);
      }
      else {
        if ($(buttonId).prop('ariaPressed') == 'false') {
          $(buttonId).click();
        }
        if (offImg) {
          $(offImg).attr('hidden', true);
        }
        $(onImg).attr('hidden', false);
      }
    }

    function getDeviceStatus(data) {
      console.log(data)
      handleStatus(data.pompa, '#buttonPompa', '#sprinklerPng', '#sprinklerGif');
      handleStatus(data.exhaustFan, '#buttonExhaustFan', '#fanPng', '#fanGif');
      handleStatus(data.phUp, '#buttonPhUp', null, '#waterDrop1');
      handleStatus(data.phDown, '#buttonPhDown', null, '#waterDrop2');
      handleStatus(data.nutrisiA, '#buttonNutrisiA', null, '#waterDrop3');
      handleStatus(data.nutrisiB, '#buttonNutrisiB', null, '#waterDrop4');
    }

    $('#buttonPompa, #buttonExhaustFan, #buttonPhUp, #buttonPhDown, #buttonNutrisiA, #buttonNutrisiB').click(function() {
      const endpoint = $(this).data('endpoint');
      sendStatusUpdate(endpoint, $(this));
    });

    function sendStatusUpdate(endpoint, button) {
      const status = button.prop('ariaPressed') == 'false' ? true : false;

      $.ajax({
        url: 'api/dashboard/updateDeviceStatus.php/' + endpoint,
        method: 'POST',
        data: {status: status},
        success: function(response) {
          console.log('Berhasil mengupdate database');
        },
        error: function(error) {
          console.error('Error updating database:', error);
        }
      })
    }

    fetchData();
    setInterval(fetchData, 1000);
  })
</script>