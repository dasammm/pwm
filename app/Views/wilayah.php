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
                        <h1 class="h3 mb-2 text-gray-800">Wilayah</h1>
                    </div>
                    <div class="col-xl-3 text-right">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahWilayah"><i class="fas fa-fw fa-plus"></i>Tambah Wilayah</a>
                    </div>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <!-- <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm display nowrap" id="dataWilayah" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Kode Wilayah</th>
                                        <th>Nama Wilayah</th>
                                        <th>Kota</th>
                                        <th>-</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tambah Wilayah Modal-->
                <div class="modal fade" id="tambahWilayah" tabindex="-1" role="dialog" aria-labelledby="modalTambahWilayah" aria-hidden="true">
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
                                <form method="POST" action="<?= base_url(); ?>/wilayah/simpan">
                                    <?= csrf_field(); ?>

                                    <div class="mb-3">
                                        <label class="col-form-label col-form-label-sm">Kode Wilayah</label>
                                        <input type="text" name="kode_wilayah" class="form-control form-control-sm" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label col-form-label-sm">Nama Wilayah</label>
                                        <input type="text" name="nama_wilayah" class="form-control form-control-sm" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label col-form-label-sm">Kota</label>
                                        <input type="text" name="kota" class="form-control form-control-sm" autocomplete="off">
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