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
                  <div class="chart tab-pane active" id="chart-1"
                    style="position: relative; height: 400px;">
                    <canvas id="allChart" style="max-height: 550px; max-width: 100%;"></canvas>
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