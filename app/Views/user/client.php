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
          <h1 class="h4 mb-0 text-gray-800">Manajemen Client</h1>
          <a href="<?= base_url(); ?>/user/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Client</a>
        </div>

        <!-- Content Row -->
        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Client</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('flash'); ?>"></div>
                <div class="table-responsive">
                  <table class="table table-bordered table-md display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr class="text-center">
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($users as $user) : ?>
                        <tr>
                          <td class="text-center"><?= $i++; ?></td>
                          <td><?= $user['username']; ?></td>
                          <td><?= $user['nama_lengkap']; ?></td>
                          <td class="text-center">
                            <a href="<?= base_url(); ?>/user/edit/<?= $user['id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url(); ?>/user/delete/<?= $user['id']; ?>" class="btn btn-danger btn-sm btn-hapus"><i class="fas fa-trash"></i></a>
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
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
<?= $this->endsection(); ?>