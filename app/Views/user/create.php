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
          <h1 class="h4 mb-0 text-gray-800">Tambah User</h1>
          <a href="<?= base_url(); ?>/user" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
        </div>

        <!-- Content Row -->
        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah User</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <form action="<?= base_url(); ?>/user/save" method="post">
                  <?= csrf_field(); ?>
                  <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= old('username'); ?>">
                      <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>" id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap'); ?>">
                      <div class="invalid-feedback">
                        <?= $validation->getError('nama_lengkap'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password">
                      <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                      <select class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>" id="role" name="role">
                        <option value="">Pilih Role</option>
                        <option value="admin" <?= (old('role') == 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="client" <?= (old('role') == 'client') ? 'selected' : ''; ?>>Client</option>
                        <option value="customer" <?= (old('role') == 'customer') ? 'selected' : ''; ?>>Customer</option>
                      </select>
                      <div class="invalid-feedback">
                        <?= $validation->getError('role'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </form>
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