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
                <div class="row mb-2">
                    <div class="col-xl-9">
                        <h1 class="h3 mb-2 text-gray-800">Masalah</h1>
                    </div>
                    <div class="col-xl-3 text-right">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahMasalah"><i class="fas fa-fw fa-plus"></i>Tambah Masalah</a>
                    </div>
                </div>

                <!-- Data Masalah -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm display nowrap" id="dataMasalah" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Kode Masalah</th>
                                        <th>Nama Masalah</th>
                                        <th>-</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tambah Masalah Modal-->
                <div class="modal fade" id="tambahMasalah" tabindex="-1" role="dialog" aria-labelledby="modalTambahMasalah" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="h6 modal-title">Tambah Data</h1>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('flash'); ?>"></div>
                                <form method="POST" action="<?= base_url(); ?>/masalah/simpan">
                                    <?= csrf_field(); ?>

                                    <div class="mb-3">
                                        <label class="col-form-label col-form-label-sm">Kode Masalah</label>
                                        <input type="text" name="kode_masalah" class="form-control form-control-sm" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label col-form-label-sm">Nama Masalah</label>
                                        <input type="text" name="nama_masalah" class="form-control form-control-sm" autocomplete="off">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            <button class="btn btn-success btn-sm" type="submit"><i class="fas fa-fw fa-save"></i>Simpan</button>
                                            <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal"><i class="fas fa-fw fa-times"></i>Cancel</button>
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