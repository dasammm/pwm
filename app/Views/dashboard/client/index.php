<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <?= $this->include('layout/sidebar'); ?>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <?= $this->include('layout/topbar'); ?>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h4 mb-0 text-gray-800">Client Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Jumlah Pelanggan-->
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pelanggan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="jmlPelanggan"><?= $jmlPelanggan; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-users fa-2x text-primary"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Jumlah Masalah -->
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Masalah Aktif</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalMasalah"><?= $totalMasalah; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Total Customers -->
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Customers</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalCustomers; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-user-friends fa-2x text-info"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Area Chart -->
          <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Customer Overview</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="myAreaChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          <!-- Pie Chart -->
          <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Status Pelanggan</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                  <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Active
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-warning"></i> Pending
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-danger"></i> Inactive
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Live Data -->
          <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Live Data</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="table-responsive">
                  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('flash'); ?>"></div>
                  <table class="table table-bordered table-md display nowrap" id="dataHome" width="100%" cellspacing="0">
                    <thead>
                      <tr class="text-center">
                        <th>No</th>
                        <th>Nomor Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Pulsa</th>
                        <th>Status Pelanggan</th>
                        <th>Status Pintu</th>
                        <th>Pembaruan</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?= $this->include('layout/footer'); ?>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
<?= $this->endsection(); ?>

<?= $this->section('utama'); ?>
<script src="<?= base_url(); ?>/js/custom-pwm.js"></script>
<script src="<?= base_url(); ?>/vendor/chart.js/Chart.min.js"></script>
<script>
// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Customers",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: <?= json_encode($customerGrowth); ?>,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
    }
  }
});

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Active", "Pending", "Inactive"],
    datasets: [{
      data: <?= json_encode($customerStatus); ?>,
      backgroundColor: ['#1cc88a', '#f6c23e', '#e74a3b'],
      hoverBackgroundColor: ['#17a673', '#daa520', '#be3c2f'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>
<?= $this->endsection(); ?>