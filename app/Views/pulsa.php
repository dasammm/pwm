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

                <div class="card shadow p-2 col-lg-6 col-md-12">
                    <div class="card-body">
                        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('flash'); ?>"></div>
                        <form method="POST" action="<?= base_url(); ?>/pulsa/simpan">
                            <?= csrf_field(); ?>

                            <div class="card mt-50 mb-50">
                                <form>
                                    <div class="row p-2">
                                        <div class="col-4"><small>Kode Pelanggan</small></div>
                                        <div class="col-8">
                                            <input class="form-control form-control-sm" name="kode_pelanggan" type="text">
                                        </div>
                                    </div>
                                    <div class="row px-2">
                                        <div class="col-12"><small>Nominal</small></div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="row-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="nominal" value="50000">
                                                    <label class="form-check-label" for="inlineRadio1">Rp. 50000</label>
                                                </div>
                                            </div>
                                            <div class="row-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="nominal" value="100000">
                                                    <label class="form-check-label" for="inlineRadio2">Rp. 100000</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="row-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="nominal" value="150000">
                                                    <label class="form-check-label" for="inlineRadio2">Rp. 150000</label>
                                                </div>
                                            </div>
                                            <div class="row-1">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="nominal" value="200000">
                                                    <label class="form-check-label" for="inlineRadio2">Rp. 200000</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-warning btn-sm m-2" type="submit" data-dismiss="modal"><i class="fas fa-fw fa-paper-plane"></i> Beli</button>
                                </form>
                            </div>
                        </form>
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