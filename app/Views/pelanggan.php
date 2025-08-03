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
                        <h1 class="h3 mb-2 text-gray-800">Pelanggan</h1>
                    </div>
                    <div class="col-xl-3 text-right">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahPelanggan"><i class="fas fa-fw fa-plus"></i>Tambah Pelanggan</a>
                    </div>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <!-- <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="flash-data" data-flashdata="<?= session()->getFlashdata('flash'); ?>"></div>
                            <table class="table table-bordered table-md display nowrap" id="dataPelanggan" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nomor ID</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat Pelanggan</th>
                                        <th>Kota Pelanggan</th>
                                        <th>Nomor Telepon</th>
                                        <th>Tipe</th>
                                        <th>Pulsa</th>
                                        <th>Volume</th>
                                        <th>Status ID</th>
                                        <th>Status Device</th>
                                        <th>-</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tambah Pelanggan Modal-->
                <div class="modal fade" id="tambahPelanggan" tabindex="-1" role="dialog" aria-labelledby="modaltambahPelanggan" aria-hidden="true">
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
                                <form method="POST" action="<?= base_url(); ?>/pelanggan/simpan">
                                    <?= csrf_field(); ?>

                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            <label class="col-form-label col-form-label-sm">Kode Pelanggan</label>
                                            <input type="text" name="kode_pelanggan" class="form-control form-control-sm" autocomplete="off">
                                        </div>
                                        <div class="col-sm-7">
                                            <label class="col-form-label col-form-label-sm">Nama Pelanggan</label>
                                            <input type="text" name="nama_pelanggan" class="form-control form-control-sm" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label col-form-label-sm">Alamat Pelanggan</label>
                                        <textarea type="text" name="alamat_pelanggan" class="form-control form-control-sm" autocomplete="off"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label col-form-label-sm">Kota Pelanggan</label>
                                        <input type="text" name="kota_pelanggan" class="form-control form-control-sm" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label col-form-label-sm">Nomor Telepon</label>
                                        <input type="text" name="nomor_telepon" class="form-control form-control-sm" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label col-form-label-sm">Tipe</label>
                                        <input type="text" name="tipe" class="form-control form-control-sm" autocomplete="off">
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