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
          <h1 class="h4 mb-0 text-gray-800">Customer Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Account Status -->
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Status Akun</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php if ($accountStatus == 'active'): ?>
                        <span class="text-success">Active</span>
                      <?php elseif ($accountStatus == 'pending'): ?>
                        <span class="text-warning">Pending</span>
                      <?php else: ?>
                        <span class="text-danger">Inactive</span>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-user-check fa-2x text-primary"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Pulsa Balance -->
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Saldo Pulsa</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($pulsaBalance, 0, ',', '.'); ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-wallet fa-2x text-success"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Door Status -->
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-<?= ($doorStatus == 'tertutup') ? 'success' : 'danger'; ?> shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-<?= ($doorStatus == 'tertutup') ? 'success' : 'danger'; ?> text-uppercase mb-1">Status Pintu</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php if ($doorStatus == 'tertutup'): ?>
                        <span class="text-success">Tertutup</span>
                      <?php else: ?>
                        <span class="text-danger">Terbuka</span>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-door-<?= ($doorStatus == 'tertutup') ? 'closed' : 'open'; ?> fa-2x text-<?= ($doorStatus == 'tertutup') ? 'success' : 'danger'; ?>"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Usage Chart -->
          <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Penggunaan Bulanan</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="myAreaChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          <!-- Quick Actions -->
          <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="d-grid gap-3">
                  <a href="<?= base_url(); ?>/pulsa/topup" class="btn btn-success btn-block">
                    <i class="fas fa-money-bill-wave fa-fw"></i> Top Up Pulsa
                  </a>
                  <a href="<?= base_url(); ?>/masalah/report" class="btn btn-warning btn-block">
                    <i class="fas fa-exclamation-triangle fa-fw"></i> Laporkan Masalah
                  </a>
                  <a href="<?= base_url(); ?>/riwayat" class="btn btn-info btn-block">
                    <i class="fas fa-history fa-fw"></i> Riwayat Transaksi
                  </a>
                  <a href="<?= base_url(); ?>/profil" class="btn btn-primary btn-block">
                    <i class="fas fa-user-edit fa-fw"></i> Edit Profil
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Transaction History -->
          <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Riwayat Transaksi Terakhir</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr class="text-center">
                        <th>Tanggal</th>
                        <th>Jenis Transaksi</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($recentTransactions as $transaction): ?>
                      <tr>
                        <td><?= $transaction['tanggal']; ?></td>
                        <td><?= $transaction['jenis']; ?></td>
                        <td>Rp. <?= number_format($transaction['jumlah'], 0, ',', '.'); ?></td>
                        <td>
                          <?php if ($transaction['status'] == 'success'): ?>
                            <span class="badge badge-success">Success</span>
                          <?php elseif ($transaction['status'] == 'pending'): ?>
                            <span class="badge badge-warning">Pending</span>
                          <?php else: ?>
                            <span class="badge badge-danger">Failed</span>
                          <?php endif; ?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
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
<script src="<?= base_url(); ?>/vendor/chart.js/Chart.min.js"></script>
<script>
// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Penggunaan",
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
      data: <?= json_encode($monthlyUsage); ?>,
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
          callback: function(value, index, values) {
            return 'Rp. ' + value;
          }
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
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp. ' + tooltipItem.yLabel;
        }
      }
    }
  }
});
</script>
<?= $this->endsection(); ?>