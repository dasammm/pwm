<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SSA SHL</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Memuat Content -->
    <?= $this->renderSection('content'); ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded bg-primary" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Pulsa Modal -->
    <div class="modal fade" id="tambahPulsa" tabindex="-1" role="dialog" aria-labelledby="modaltambahPulsa" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="h6 modal-title">Isi Pulsa</h1>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('flash'); ?>"></div>
                    <form method="POST" action="<?= base_url(); ?>/pulsa/simpan">
                        <?= csrf_field(); ?>

                        <div class="card mt-50 mb-50">
                            <form>
                                <div class="row p-2">
                                    <div class="col-4"><small>Kode Pelanggan</small></div>
                                    <div class="col-6">
                                        <input class="form-control form-control-sm" name="kode_pelanggan" type="text">
                                    </div>
                                    <div class="col-2 text-left">
                                        <button class="btn btn-primary btn-sm" type="button" data-dismiss="modal"><i class="fas fa-fw fa-search"></i></button>
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-4"><small>Nama Pelanggan</small></div>
                                    <div class="col-8">
                                        <input class="form-control form-control-sm" type="text">
                                    </div>
                                </div>
                                <div class="row px-2">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12"><small>Nominal</small></div>
                                            <div class="col-6">
                                                <div class="row-1">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="nominal" value="50000">
                                                        <label class="form-check-label" for="inlineRadio1">Rp. 50000</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="nominal" value="100000">
                                                        <label class="form-check-label" for="inlineRadio2">Rp. 100000</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="nominal" value="150000">
                                                        <label class="form-check-label" for="inlineRadio2">Rp. 150000</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="nominal" value="200000">
                                                        <label class="form-check-label" for="inlineRadio2">Rp. 200000</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-6">
                                                <div class="row-1">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                        <label class="form-check-label" for="inlineRadio1">Rp. 50000</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                        <label class="form-check-label" for="inlineRadio2">Rp. 100000</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                        <label class="form-check-label" for="inlineRadio2">Rp. 150000</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                                        <label class="form-check-label" for="inlineRadio2">Rp. 250000</label>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-warning btn-sm m-2" type="submit" data-dismiss="modal"><i class="fas fa-fw fa-paper-plane"></i> Proses</button>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url(); ?>/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>
    <!--<script src="<?= base_url(); ?>/js/custom-pwm.js"></script>-->
    <?= $this->renderSection('utama'); ?>

    <!-- Page level plugins -->
    <!-- <script src="<?= base_url(); ?>/vendor/chart.js/Chart.min.js"></script> -->
    <script src="<?= base_url(); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="<?= base_url(); ?>/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>/js/demo/chart-pie-demo.js"></script> -->
    <script src="<?= base_url(); ?>/js/pwm-datatables.js"></script>

    <!-- Sweet Alert -->
    <script src="<?= base_url(); ?>/vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/sweetalert2/custom-alert.js"></script>

</body>

</html>