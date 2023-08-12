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
          <li class="breadcrumb-item active">Dashboard v1</li>
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
      <section class="col-lg-6 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-temperature-high mr-1"></i>
              Suhu
            </h3>  
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- Temperature Chart -->
              <div class="chart tab-pane active" id="chart-1"
                    style="position: relative; height: 300px;">
                    <canvas id="tempChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              <!-- <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
              <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="col-lg-6 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-sun"></i>
              Kelembapan
            </h3>  
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- Humidity Chart -->
              <div class="chart tab-pane active" id="chart-2"
                    style="position: relative; height: 300px;">
                    <canvas id="humidChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              <!-- <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
              <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="col-lg-6 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-vial"></i>
              pH
            </h3>  
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- pH Chart -->
              <div class="chart tab-pane active" id="chart-3"
                    style="position: relative; height: 300px;">
                    <canvas id="phChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              <!-- <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
              <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="col-lg-6 connectedSortable">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-seedling"></i>
              Tds
            </h3>  
          <div class="card-body">
            <div class="tab-content p-0">
              <!-- tds Chart -->
              <div class="chart tab-pane active" id="chart-4"
                    style="position: relative; height: 300px;">
                    <canvas id="tdsChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              <!-- <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
              <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> -->
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</section>