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
          <h1 class="h4 mb-0 text-gray-800">Halaman Utama</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Jumlah Pelanggan-->
          <div class="col-xl-6 col-md-6 mb-4">
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
          <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Masalah Aktif</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalMasalah"><?= $totalMasalah; ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Row -->

        <div class="row">

          <!-- Area Chart -->
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
<?= $this->endsection(); ?>