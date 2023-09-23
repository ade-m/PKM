<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="row d-flex justify-content-between">
              <div class="col-6">
                <div class="row">
                  <div class="col-12">
                    <h4>Suhu</h4>
                  </div>
                  <div class="col-12">
                    <span id="latestTemp"></span>
                  </div>
                </div>
              </div>
              <i 
                class="circle-icon fas fa-thermometer-empty" 
                style="padding: 0.3em 0.5em; background-color: rgba(219, 4, 4);">
              </i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="row d-flex justify-content-between">
              <div class="col-7">
                <div class="row">
                  <div class="col-12">
                    <h4>Kelembapan</h4>
                  </div>
                  <div class="col-12">
                    <span id="latestHumid"></span>
                  </div>
                </div>
              </div>
              <i 
                class="circle-icon fa-brands fa-hotjar" 
                style="padding: 0.3em 0.25em; background-color: rgba(250, 207, 22);">
              </i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="row d-flex justify-content-between">
              <div class="col-6">
                <div class="row">
                  <div class="col-12">
                    <h4>PH</h4>
                  </div>
                  <div class="col-12">
                    <span id="latestPH"></span>
                  </div>
                </div>
              </div>
              <i 
                class="circle-icon fas fa-vial" 
                style="padding: 0.3em 0.3em; background-color: rgba(40, 4, 219);">
              </i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <div class="row d-flex justify-content-between">
              <div class="col-6">
                <div class="row">
                  <div class="col-12">
                    <h4>Nutrisi</h4>
                  </div>
                  <div class="col-12">
                    <span id="latestTds"></span>
                  </div>
                </div>
              </div>
              <i 
                class="circle-icon fas fa-seedling" 
                style="padding: 0.3em 0.25em; background-color: rgba(4, 219, 26);">
              </i>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <section class="col-lg-12 connectedSortable">
          <div class="card">
            <div class="card-body">
              <div class="tab-content p-0">
                <div class="row">
                  <div class="col-12 mb-2">
                    <h3 class="card-title">
                      <i class="fas fa-globe mr-1"></i>
                      Overview (<?= date("d F Y") ?>)
                    </h3>
                  </div>
                  <div class="col-12">
                    <!-- All Chart -->
                    <div class="chart tab-pane active" id="chart-1" style="position: relative; height: 450px;">
                      <canvas id="allChart" style="max-width: 100%;"></canvas>
                    </div>
                  </div>
                </div>
                <!-- <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
              <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
              </div>
            </div>
          </div>
        </section>
        <!-- <section class="col-lg-6 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-sun"></i>
              Kelembapan
            </h3>  
          <div class="card-body">
            <div class="tab-content p-0">
           
              <div class="chart tab-pane active" id="chart-2"
                    style="position: relative; height: 300px;">
                    <canvas id="humidChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
      </div>
    </div>
</section>